<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CuisinesResource\Pages;
use App\Filament\Resources\CuisinesResource\RelationManagers;
use App\Models\Cuisines;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
class CuisinesResource extends Resource
{
    protected static ?string $model = Cuisines::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 5;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_en')->label('Delivery Option Name (English)')->required()->columnSpan('full'),
                Forms\Components\TextInput::make('name_ar')->label('Delivery Option (Arabic)')->required()->columnSpan('full'),
                Forms\Components\FileUpload::make('image')->label('Main image (500x500)')->image()->imageResizeTargetWidth('100')->imageResizeTargetHeight('100')->columnSpan('full')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->rowIndex()->label('ID'),
                TextColumn::make('name_en')->label('Cuisine Name')->searchable(isIndividual: true, isGlobal: false),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCuisines::route('/'),
            'create' => Pages\CreateCuisines::route('/create'),
            'edit' => Pages\EditCuisines::route('/{record}/edit'),
        ];
    }
}
