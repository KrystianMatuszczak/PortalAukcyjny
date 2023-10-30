<?php

namespace App\Http\Livewire\Shipments;

use App\Http\Livewire\Shipments\Actions\EditShipmentAction;
use App\Models\Shipment;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Traits\Restore;
use App\Http\Livewire\Traits\SoftDelete;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Livewire\Shipments\Actions\RestoreShipmentAction;
use App\Http\Livewire\Shipments\Actions\SoftDeleteShipmentAction;


class ShipmentsTableView extends TableView
{
  use Actions;
  use SoftDelete;
  use Restore;
  use WithPagination;
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Shipments::class;

    public $searchBy = [
      'name',

    ];
    protected $paginate = 5;

    public function repository(): Builder

    {
        return Shipment::query()->withTrashed();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
          Header::title('Nazwa')->sortBy('name'),
          Header::title('Cena'),

        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
          $model->name,
          $model->shipPrice,

        ];
    }

    protected function actionsByRow()
    {
        return[
            new EditShipmentAction('shipments.edit', __('Edytuj')),
            new SoftDeleteShipmentAction(),
            new RestoreShipmentAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $shipment = Shipment::find($id);
        $shipment -> delete();
        $this->notification()->success(
            $title = __('Usunięto'),
            $description = __('Usunięto kategorię :name',[
                'name'=>$shipment->name,
            ])
            );
    }

    public function restore(int $id)
    {
        $shipment = Shipment::withTrashed()->find($id);
        $shipment->restore();
        $this->notification()->success(
            $title=__('Przywrócono'),
            $description=__('Przywrócono kategorię :name',[
                'name'=>$shipment->name,
            ])
        );
    }
}
