<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documents;
use App\Models\AboutMe;
class CreateAbout extends CreateRecord
{
    protected static string $resource = AboutResource::class;
    protected function getFormModel(): string
    {
        return AboutMe::class;
    }
    protected function handleRecordCreation(array $data): Model
    {
        $about = AboutMe::create($data);
        AboutMe::where('id','!=',$about->id)->update(['status'=>'Draft']);
        if(count($data['documents'])>0){
            foreach($data['documents'] as $image){
            $document = new Documents;
            $document->url = $image;
            $about->documents()->save($document);
         }
        }
        return $about;
        // return $this->form->model($about)->saveRelationships();
    }
}
