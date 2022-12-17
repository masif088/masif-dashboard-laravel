<?php

namespace App\Http\Livewire\Table;


//use App\Repository\User;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component {

    use WithPagination;

    public $model;
    public $name;
    public $modelId;
    public $dataId;
    public $param1;
    public $param2;
    public $param3;
    public $data;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';
    protected $paginationTheme = 'tailwind';
    protected $listeners = ["deleteItem" => "delete_item", 'delete' => 'delete'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function deleteItem($id)
    {
        $this->data = $this->model::find($id);
        if (!$this->data) {
            $this->emit("deleteResult", ["status" => false, "message" => "Gagal menghapus data " . $this->name]);
            return;
        }
        $this->emit('swal:confirm', [
            'icon'        => 'warning',
            'title'       => 'apakah anda yakin ingin menghapus data ini',
            'confirmText' => 'Hapus',
            'method'      => 'delete',
        ]);

    }

    public function delete()
    {
        $this->data->delete();
        $this->emit('swal:alert', [
            'icon'  => 'success',
            'title' => 'Berhasil menghapus data',
        ]);
    }

    public function render()
    {
        $data = $this->get_pagination_data();
        return view('components.data-table', $data);
    }

    public function get_pagination_data()
    {
        $this->model = "\App\Repository\\$this->name";
        $this->model = new $this->model();
        $data = $this->model::tableSearch(['query' => $this->search, 'param1' => $this->param1, 'param2' => $this->param2, 'param3' => $this->param3])
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
        $return=$this->model::tableView();
        $return["datas"] = $data;
        return $return;
    }
}
