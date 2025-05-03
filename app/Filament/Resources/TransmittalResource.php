<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransmittalResource\Pages;
use App\Models\Drawing;
use App\Models\Package;
use App\Models\Transmittal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Livewire\Component as Livewire;

class TransmittalResource extends Resource
{
  protected static ?string $model = Transmittal::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Wizard::make([
          Forms\Components\Wizard\Step::make('Project')
            ->icon('heroicon-o-briefcase')
            ->schema([
              Forms\Components\Select::make('project_id')
                ->label('Select Project')
                ->dehydrated(false)
                ->relationship('project', 'project_name')
                ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->project_code} {$record->project_name}")
                // ->afterStateUpdated(fn (Livewire $livewire) => $livewire->reset('data.package_id'))
                ->searchable('project_name', 'project_code')
                ->preload()
                ->live()
                ->required(),
              Forms\Components\Select::make('package_id')
                ->label('Select Package')
                ->options(fn(Get $get): Collection => Package::where('project_id', $get('project_id'))->pluck('name', 'id')),
            ]),
          Forms\Components\Wizard\Step::make('Drawing')
            ->icon('heroicon-o-document-text')
            ->schema([
              Forms\Components\Select::make('drawing_id')
                ->label('Select Drawing')
                ->relationship('drawing', 'drawing_title')
                ->searchable('drawing_title', 'drawing_number')
                ->preload()
                ->live()
                ->options(fn(Get $get): Collection => Drawing::where('project_id', $get('project_id'))->pluck('name', 'id')),
            ]),
          Forms\Components\Wizard\Step::make('Nesting Items')
            ->icon('heroicon-o-list-bullet')
            ->schema([
              Forms\Components\Repeater::make('transmittalItems')
                ->label('Nesting Items')
                ->relationship()
                ->schema([
                  Forms\Components\TextInput::make('mark_number')
                    ->label('Mark Number')
                    ->required(),
                  Forms\Components\Select::make('material')
                    ->label('Material')
                    ->options([
                      'Plate' => 'Plate',
                      'Tube/Pipe' => 'Tube/Pipe',
                      'Beam' => 'Beam',
                    ])
                    ->required(),
                  Forms\Components\TextInput::make('material_grade')
                    ->label('Grade')
                    ->required(),
                  Forms\Components\TextInput::make('thickness')
                    ->label('Thickness')
                    ->required(),
                  Forms\Components\TextInput::make('quantity')
                    ->label('Quantity')
                    ->required(),
                  Forms\Components\TextInput::make('unit')
                    ->label('Unit')
                    ->required(),
                ])
                ->columns(6)
                ->addActionLabel('Add Item'),
            ]),
        ])->columnSpan(2),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('transmittal_number')
          ->label('Transmittal Number')
          ->sortable()
          ->searchable(),
        Tables\Columns\TextColumn::make('nesting_type')
          ->label('Type')
          ->sortable()
          ->searchable(),
        Tables\Columns\TextColumn::make('created_at')
          ->label('Requested Date')
          ->dateTime($format = 'D d/m/Y')
          ->sortable()
          ->searchable(),
        Tables\Columns\TextColumn::make('issued_date')
          ->label('Issued Date')
          ->dateTime($format = 'D d/m/Y')
          ->sortable(),
        Tables\Columns\TextColumn::make('requestedBy.name')
          ->label('Requested By')
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true)
          ->searchable(),
        Tables\Columns\TextColumn::make('nestingBy.name')
          ->label('Prepared By')
          ->sortable()
          ->searchable(),
        Tables\Columns\TextColumn::make('project.project_name')
          ->label('Project')
          ->sortable()
          ->searchable(),
        Tables\Columns\TextColumn::make('drawing.drawing_number')
          ->label('Drawing Number')
          ->sortable()
          ->searchable(),
        Tables\Columns\TextColumn::make('drawing.drawing_title')
          ->label('Drawing Title')
          ->sortable()
          ->searchable(),
      ])
      ->filters([
        //
      ])
      ->actions([
        Tables\Actions\ActionGroup::make([
          Tables\Actions\EditAction::make(),
          Tables\Actions\ViewAction::make()
            ->url(fn(Transmittal $record): string => route('transmittals.show', $record)),
          Tables\Actions\Action::make('Issued Date')
            ->icon('heroicon-o-calendar')
            ->requiresConfirmation()
            ->form([
              Forms\Components\DatePicker::make('issued_date')
                ->label('Issued Date')
                ->required(),
            ])
            ->action(function (array $data, Transmittal $record): void {
              $record->update(['issued_date' => $data['issued_date']]);
            }),
            Tables\Actions\Action::make('Assign Nesting By')
            ->icon('heroicon-o-user-group')
            ->requiresConfirmation()
            ->form([
              Forms\Components\Select::make('nesting_by')
                ->label('Nesting By')
                ->options(\App\Models\User::query()->pluck('name', 'id'))
                ->required(),
            ])
            ->action(function (array $data, Transmittal $record): void {
              $record->nestingBy()->associate($data['nestning_by'])
                ->save();
              $record->save();
            })->action(function (array $data, Transmittal $record): void {
              $record->update(['nesting_by' => $data['nesting_by']]);
            }),
          Tables\Actions\DeleteAction::make(),
        ]),
      ], position: ActionsPosition::BeforeColumns)
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
        ]),
      ]);
  }

  public static function getRelations(): array
  {
    return [
      //
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListTransmittals::route('/'),
      'create' => Pages\CreateTransmittal::route('/create'),
      'edit' => Pages\EditTransmittal::route('/{record}/edit'),
    ];
  }
}
