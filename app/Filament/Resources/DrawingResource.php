<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DrawingResource\Pages;
use App\Filament\Resources\DrawingResource\RelationManagers;
use App\Models\Drawing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DrawingResource extends Resource
{
    protected static ?string $model = Drawing::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('drawing_number')
                    ->required(),
                Forms\Components\TextInput::make('drawing_title')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'Issued For Review' => 'Issued For Review',
                        'Issued For Approval' => 'Issued For Approval',
                        'Issued For Information' => 'Issued For Information',
                        'Approved For Construction' => 'Approved For Construction',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('remarks')
                    ->required(),
                Forms\Components\Repeater::make('revision')
                    ->relationship()
                    ->schema([
                        Forms\Components\TextInput::make('revision_number')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('revision_title')
                            ->required(),
                        Forms\Components\DatePicker::make('revision_date')
                            ->required(),
                        Forms\Components\TextInput::make('remarks')
                            ->required(),
                    ])
                    ->columns(2)
                    ->createItemButtonLabel('Add Revision'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project.project_code')
                    ->label('Project Code')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('project.project_name')
                    ->label('Project Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('drawing_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('revision.revision_number')
                    ->searchable()
                    ->label('Rev'),
                Tables\Columns\TextColumn::make('drawing_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('remarks')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListDrawings::route('/'),
            'create' => Pages\CreateDrawing::route('/create'),
            'edit' => Pages\EditDrawing::route('/{record}/edit'),
        ];
    }
}
