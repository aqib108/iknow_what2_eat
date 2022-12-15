<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RestaurantsResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers\CategoriesRelationManager;
use App\Models\Restaurants;
use App\Models\Cuisines;
use App\Models\Categories;
use App\Models\Amenities;
use App\Models\delivery_options as DeliveryOptions;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
class RestaurantsResource extends Resource
{
    protected static ?string $model = Restaurants::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 7;
    public static function form(Form $form): Form
    {
        //form
        return $form
            ->schema([
                Forms\Components\Section::make('Resturant Status')->schema([
                    Forms\Components\Select::make('status')->options(['Active','Inactive'])->default('Active')->disablePlaceholderSelection()->columnSpan('full'),
                    Forms\Components\Checkbox::make('New')->label('New in Town')->columnSpan('full'),
                ])->compact(),

                Forms\Components\Section::make('Cuisines & occassions')->schema([
                    Forms\Components\Select::make('cusinies_id')->label('cuisines')->options(Cuisines::all()->pluck('name_en', 'id'))->multiple()->disablePlaceholderSelection()->columnSpanFull(),
                    Forms\Components\Select::make('occassions')->label('occassions')->relationship('categories', 'name_en')->multiple()->preload()->disablePlaceholderSelection()->columnSpanFull(),
                ])->compact(),
                Forms\Components\Section::make('Main Information')->schema([
                    Forms\Components\Tabs::make('Resturant Main Information')
                ->tabs([
                Forms\Components\Tabs\Tab::make('English')
              ->schema([
                Forms\Components\TextInput::make('name_en')->label('Resturant Name (English)')->required()->columnSpan('full'),
                Forms\Components\TextInput::make('price_en')->type('number')->label('Avarge Price (English)')->required()->columnSpan('full'),
                Forms\Components\TextInput::make('additional_price')->label('Additional Prices Text (optional)')->columnSpan('full'),
                Forms\Components\Select::make('phone_country_code')->options(['+973','+971'])->default('+973')->disablePlaceholderSelection(),
                Forms\Components\TextInput::make('phone')->label('Phone'),
                Forms\Components\TextInput::make('instagram_handle')->label('Instagram Hanlde (optional)')->columnSpan('full'),
                Forms\Components\Textarea::make('res_description_en')->label('About Resturant')->required(),
                Forms\Components\TextInput::make('meat_poultry_source_en')->label('Meat & Poultary Sources')->columnSpan('full')->required(),
            ]),
            Forms\Components\Tabs\Tab::make('Arabic')
            ->schema([
                Forms\Components\TextInput::make('name_en')->label('Resturant Name (Arabic)')->required()->columnSpan('full'),
                Forms\Components\TextInput::make('price_ar')->type('number')->label('Avarge Price (Arabic)')->required()->columnSpan('full'),
                Forms\Components\TextInput::make('additional_price')->label('Additional Prices Text (optional)')->columnSpan('full'),
                Forms\Components\Textarea::make('res_description_ar')->label('About Resturant')->required(),
                Forms\Components\TextInput::make('meat_poultry_source_ar')->label('Meat & Poultary Sources')->columnSpan('full')->required(),
            ]),

        ]),
                ])->compact(),

        Forms\Components\Section::make('Location & Foods Trucks')->schema([
            Forms\Components\Section::make('Location & Branch Name')->schema([
            Forms\Components\Repeater::make('Location & Branch') ->schema([
                Forms\Components\TextInput::make('location name')->required(),
                Forms\Components\TextInput::make('location url')->required(),
            ])->createItemButtonLabel('+ Add Branch'),
            ])->compact(),
            Forms\Components\Section::make(' Foods Trucks')->schema([
                Forms\Components\Repeater::make('Food Trucks') ->schema([
                    Forms\Components\TextInput::make('location name')->required(),
                    Forms\Components\TextInput::make('location url')->required(),
                ])->createItemButtonLabel('+ Add Food Truck'),
                ])->compact(),

        ])->compact(),
        Forms\Components\Section::make('Timing,Amenities & Deliveries')->schema([
            Forms\Components\Fieldset::make('Timing')->schema([
        Forms\Components\Checkbox::make('Sunday'),
        Forms\Components\TimePicker::make('from'),
        Forms\Components\TimePicker::make('to'),
        Forms\Components\Checkbox::make('Monday'),
        Forms\Components\TimePicker::make('from'),
        Forms\Components\TimePicker::make('to'),
        Forms\Components\Checkbox::make('Tuseday'),
        Forms\Components\TimePicker::make('from'),
        Forms\Components\TimePicker::make('to'),
        Forms\Components\Checkbox::make('Wednesday'),
        Forms\Components\TimePicker::make('from'),
        Forms\Components\TimePicker::make('to'),
        Forms\Components\Checkbox::make('Thursday'),
        Forms\Components\TimePicker::make('from'),
        Forms\Components\TimePicker::make('to'),
        Forms\Components\Checkbox::make('Friday'),
        Forms\Components\TimePicker::make('from'),
        Forms\Components\TimePicker::make('to'),
        Forms\Components\Checkbox::make('Saturday'),
        Forms\Components\TimePicker::make('from'),
        Forms\Components\TimePicker::make('to')
    ])
    ->columns(3),
    Forms\Components\Fieldset::make('Amenities')->schema([
        Forms\Components\CheckboxList::make('amenities')->label('')
        ->options(Amenities::all()->pluck('name_en','id'))
        ->columns(4)
    ])->columns(1),
    Forms\Components\Fieldset::make('Delivery Options')->schema([
        Forms\Components\CheckboxList::make('delivery_options')->label('')
        ->options(DeliveryOptions::all()->pluck('name_en','id'))
        ->columns(4)
    ])->columns(1),

        ])->compact(),
        Forms\Components\Section::make('Menus')->schema([
            Forms\Components\Repeater::make('Location & Branch Name')->label('')->schema([
                Forms\Components\TextInput::make('Menu name')->required(),
                Forms\Components\TextInput::make('Menu url')->required(),
                Forms\Components\FileUpload::make('images')
                ->multiple()->image()
            ])->createItemButtonLabel('+ Add Menu'),
        ])->compact(),
        Forms\Components\Section::make('Photos')->schema([
            Forms\Components\Repeater::make('Items')->label('')->schema([
                Forms\Components\FileUpload::make('images')->image(),
                Forms\Components\TextInput::make('name_en')->label('caption\Item Name (English)')->required(),
                Forms\Components\TextInput::make('name_en')->label('caption\Item Name (Arabic)')->required(),
                Forms\Components\TextInput::make('price')->label('Price (BHD)')->required(),
                Forms\Components\Select::make('cusinies_id')->label('cuisines')->options(Cuisines::all()->pluck('name_en', 'id'))->multiple()->disablePlaceholderSelection(),
                Forms\Components\Select::make('occassions')->label('occassions')->options(Categories::all()->pluck('name_en', 'id'))->multiple()->disablePlaceholderSelection(),
            ])->createItemButtonLabel('+ Add Image'),
        ])->compact(),
        Forms\Components\Section::make('Shukris Favourites')->schema([
            Forms\Components\Repeater::make('Items')->label('')->schema([
                Forms\Components\TextInput::make('name_en')->label('Item Name (English)')->required(),
                Forms\Components\TextInput::make('name_en')->label('Item Name (Arabic)')->required(),
                Forms\Components\FileUpload::make('images')->image(),
                Forms\Components\TextInput::make('price')->label('Price (BHD)')->required(),
            ])->createItemButtonLabel('+ Add New Items'),
        ])->compact()
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
            CategoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRestaurants::route('/'),
            'create' => Pages\CreateRestaurants::route('/create'),
            'edit' => Pages\EditRestaurants::route('/{record}/edit'),
        ];
    }
}
