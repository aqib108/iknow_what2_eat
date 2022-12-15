<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NotificationsResource\Pages;
use App\Filament\Resources\NotificationsResource\RelationManagers;
use App\Models\Notifications;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use DB;
class NotificationsResource extends Resource
{
    protected static ?string $model = Notifications::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Title')->required()->columnSpan('full'),
                Forms\Components\TextArea::make('message')->label('Message')->required()->columnSpan('full'),
                Forms\Components\Fieldset::make('Amenities')->label('This Notification Link to')->schema([
                    Forms\Components\Radio::make('notification_link_to')->label('')
                    ->options([
                        'General App'=>'General App',
                        'Offer Section'=>'Offer Section',
                        'Resturant'=>'Resturant',
                        'Collabration Item'=>'Collabration Item',
                        'Cuision/Category/Occassion'=>'Cuision/Category/Occassion',
                        'Surprise Me Section'=>'Surprise Me Section'
                        ])
                ])->columns(3),
                Forms\Components\Select::make('resturant_ids')->label('Resturant')
                ->multiple()
                ->options(DB::table('restaurants')->wherestatus(1)->get()->pluck('name','id'))->columnSpan('full'),
                Forms\Components\Select::make('status')->options(['Publish'=>'Publish','Draft'=>'Draft'])->default('Publish')->disablePlaceholderSelection()->columnSpan('full'),
           ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->rowIndex()->label('ID'),
                TextColumn::make('title')->label('title'),
                TextColumn::make('message')->label('message'),
                TextColumn::make('updated_at')->label('Last Updated')->sortable(),
                TextColumn::make('status')->label('status')->weight('bold')->color('primary'),
            ])
            ->filters([
                SelectFilter::make('status')
              ->options(['Publish','Draft'])->attribute('status')
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
            'index' => Pages\ListNotifications::route('/'),
            'create' => Pages\CreateNotifications::route('/create'),
            'edit' => Pages\EditNotifications::route('/{record}/edit'),
        ];
    }
}
