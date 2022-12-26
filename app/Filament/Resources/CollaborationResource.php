<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CollaborationResource\Pages;
use App\Filament\Resources\CollaborationResource\RelationManagers;
use App\Models\Collaboration;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
class CollaborationResource extends Resource
{
    protected static ?string $model = Collaboration::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')->options(['Publish'=>'Publish','Draft'=>'Draft'])->default('Publish')->disablePlaceholderSelection()->columnSpan('full'),
                Forms\Components\TextInput::make('item_name')->label('Item Name')->required()->columnSpan('full'),
                Forms\Components\TextInput::make('price_range')->label('Price Range (BHD)')->columnSpan('full'),
                Forms\Components\FileUpload::make('logo')->image()->imageResizeTargetWidth('100')->imageResizeTargetHeight('100')->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->rowIndex()->label('ID'),
                TextColumn::make('item_name')->label('')->searchable(isIndividual: true, isGlobal: false),
                TextColumn::make('updated_at')->label('Last Updated')->sortable(),
                TextColumn::make('status')->label('status')->weight('bold')->color('primary'),
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
            'index' => Pages\ListCollaborations::route('/'),
            'create' => Pages\CreateCollaboration::route('/create'),
            'edit' => Pages\EditCollaboration::route('/{record}/edit'),
        ];
    }
}
