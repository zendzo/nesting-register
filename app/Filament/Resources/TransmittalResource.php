<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransmittalResource\Pages;
use App\Filament\Resources\TransmittalResource\RelationManagers;
use App\Models\Transmittal;
use App\Models\Drawing;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
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
                          ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->project_code} {$record->project_name}")
                          // ->afterStateUpdated(fn (Livewire $livewire) => $livewire->reset('data.package_id'))
                          ->searchable('project_name', 'project_code')
                          ->preload()
                          ->live()
                          ->required(),
                        Forms\Components\Select::make('package_id')
                          ->label('Select Package')
                          ->options(fn (Get $get): Collection => Package::where('project_id', $get('project_id'))->pluck('name', 'id'))
                      ]),
                      Forms\Components\Wizard\Step::make('Drawing')
                      ->icon('heroicon-o-document-text')
                      ->schema([
                          Forms\Components\Select::make('drawing_id')
                          ->label('Select Drawing')
                          ->relationship('drawing', 'drawing_id')
                          ->options(fn (Get $get): Collection => Drawing::where('project_id', $get('project_id'))->pluck('drawing_number', 'drawing_title','id')),
                      ]),
                      Forms\Components\Wizard\Step::make('Transmital')
                      ->icon('heroicon-o-list-bullet')
                      ->schema([])
                ])->columnSpan(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
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
