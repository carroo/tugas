<div>
    <div class="d-flex justify-content-center">
        <div class="col-6">
            <div class="card border-primary">
                <div class="card-header">Form</div>
                <div class="card-body">
                        <div class="form-group">
                        <input type="text" wire:model='name' class="form-control"  placeholder="Name" required>
                        </div>
                        <div class="form-group">
                        <input type="date" wire:model='birthday' class="form-control" required>
                        </div>
                        <button type="submit" wire:click='simpan' class="btn btn-primary btn-block">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <div class="col-6">
            <div class="card border-primary">
                <div class="card-body">
                    @if($nothing)
                    <table class="table table-hover">
                        <thead class="bg-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Birth Day</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($friends as $key => $value)
                            <tr>
                                <th>{{ $key+1 }}</th>
                                <td>{{ $value->name }}</td>
                                <td>{{ date("j F, Y", strtotime($value->birthday)) }}</td>
                                <td>
                                    <button wire:click='edit({{ $value->id }})' class="btn btn-sm btn-warning text-white">
                                        Edit
                                    </button>
                                    <button wire:click='hapus({{ $value->id }})' class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                  </td>
                            </tr>
                            @endforeach
                    </table>
                    @else
                        <div class="text-center">Tidak punya teman. Tambahkan teman</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>