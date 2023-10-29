<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Database\Eloquent\Model;

trait SoftDelete
{
    protected function softDeleteNotificationTitle()
    {
        return __('Pomyslnie usuneto');
    }

    protected function softDeleteNotificationDescription(Model $model)
    {
        return __('Sukces',[
            'model' => $model
        ]);
    }

    public function softDelete(int $id)
    {
         $model = $this->model::find($id);
         $model->delete();
         $this->notification()->success(
            $title = $this->softDeleteNotificationTitle(),
            $description = $this->softDeleteNotificationDescription($model),
         );
    }
}
