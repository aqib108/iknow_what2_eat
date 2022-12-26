<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\AboutMe;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
class AboutResource extends Resource
{
    protected static ?string $model = AboutMe::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'About Me';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title_en')->label('Title')->required()->placeholder('title (This wont be seen anyone)')->columnSpan('full'),
                Forms\Components\Textarea::make('about_me_en')->label('About Me Text (English)')->required()->placeholder('Enter Your Paragraph Here')->columnSpan('full'),
                Forms\Components\Textarea::make('about_me_ar')->label('About Me Text (Arabic)')->required()->placeholder('Enter Your Paragraph Here')->columnSpan('full'),
                Forms\Components\Textarea::make('stay_social_en')->label('Stay Social Text (English)')->required()->placeholder('Enter Your Paragraph Here')->columnSpan('full'),
                Forms\Components\Textarea::make('stay_social_ar')->label('Stay Social Text (Arabic)')->required()->placeholder('Enter Your Paragraph Here')->columnSpan('full'),
                Forms\Components\TextInput::make('insta_url')->label('Instagram URL')->placeholder('Instagram url'),
                Forms\Components\TextInput::make('snapchat_url')->label('Snapchat URL')->placeholder('Snapchat url'),
                Forms\Components\TextInput::make('tiktok_url')->label('Tiktok URL')->placeholder('Tiktok url'),
                Forms\Components\TextInput::make('youtube_url')->label('Youtube URL')->placeholder('Youtube url'),
                Forms\Components\FileUpload::make('documents')->label('Photos')
                ->multiple()->image()->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->rowIndex()->label('ID'),
                TextColumn::make('title_en')->label('Title')->searchable(isIndividual: true, isGlobal: false),
                TextColumn::make('updated_at')->label('Last Updated')->sortable(),
                TextColumn::make('status')->label('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
