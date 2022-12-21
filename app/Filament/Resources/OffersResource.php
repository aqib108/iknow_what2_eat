<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OffersResource\Pages;
use App\Filament\Resources\OffersResource\RelationManagers;
use App\Models\Offers;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OffersResource extends Resource
{
    protected static ?string $model = Offers::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')->options(['Draft'=>"Draft",'Expired'=>'Expired','No Expiry'=>'No Expiry','Active'=>'Active'])->disablePlaceholderSelection()->columnSpan('full'),
                Forms\Components\TextInput::make('offer_code')->label('Offer Code')->required()->columnSpan('full'),
                Forms\Components\TextInput::make('restuarant_name')->label('Restuarant name')->required()->columnSpan('full'),
                Forms\Components\TextInput::make('description')->label('Description')->columnSpan('full'),
                Forms\Components\DatePicker::make('expiry_date')->label('Expiry Date (optional)'),
                Forms\Components\Checkbox::make('no_expiry'),
                Forms\Components\FileUpload::make('logo')->label('Logo (500x500)')->image()->imageResizeTargetWidth('500')->imageResizeTargetHeight('500')->columnSpan('full'),
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
            'index' => Pages\ListOffers::route('/'),
            'create' => Pages\CreateOffers::route('/create'),
            'edit' => Pages\EditOffers::route('/{record}/edit'),
        ];
    }
}
