<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoriesResource\Pages;
use App\Filament\Resources\CategoriesResource\RelationManagers;
use App\Models\Categories;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use DB;
class CategoriesResource extends Resource
{
    protected static ?string $model = Categories::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationLabel = 'Categories & Occassions';
    protected static ?int $navigationSort = 4;
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('status')->options(['InActive'=>'InActive','Active'=>'Active'])->disablePlaceholderSelection()->columnSpan('full'),
            Forms\Components\TextInput::make('name_en')->label('Category Name (English)')->required()->columnSpan('full'),
            Forms\Components\TextInput::make('name_ar')->label('Category Name (Arabic)')->required()->columnSpan('full'),
            IconPicker::make('icon')->columnSpan('full'),
            FileUpload::make('custom_icon')->image()->imageResizeTargetWidth('100')->imageResizeTargetHeight('100')->columnSpan('full'),
            Select::make('resturant_ids')->label('Resturant')
            ->multiple()
            ->options(DB::table('restaurants')->wherestatus(1)->get()->pluck(['id','name']))->columnSpan('full')
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->rowIndex()->label('ID'),
                TextColumn::make('name_en')->label('Category Name')->searchable(isIndividual: true, isGlobal: false),
                BadgeColumn::make('status')->enum(['Active' => 'Active','Inactive' => 'Inactive']) ->colors([
                    'primary',
                    'secondary' => 'Active',
                    'warning' => 'Inactive',
                ]),
                TextColumn::make('status'),
                ImageColumn::make('custom_icon')
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategories::route('/create'),
            'edit' => Pages\EditCategories::route('/{record}/edit'),
        ];
    }
}
