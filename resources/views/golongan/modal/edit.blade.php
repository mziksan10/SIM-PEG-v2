@foreach($data_golongan as $item)   
<form action="/golongan/{{ $item->id }}" method="POST">
@method('put')
@csrf

<div class="modal fade" tabindex="-1" id="editModal{{ $item->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

        <div class="form-row">
        <div class="form-group col-md-6">
            <label>Golongan</label>
            <input type="text" class="form-control @error('golongan') is-invalid @enderror" name="golongan" value="{{ old('golongan', $item->golongan) }}">
            @error('golongan')
            <div class="invalid-feedback ml-3">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group col-md-6">
            <label>Jenjang</label>
            <select name="jenjang" class="form-control @error('jenjang') is-invalid @enderror">
                <option value="">Pilih..</option>
                @foreach($jenjang as $j)
                @if(old('jenjang', $item->jenjang) == $j)
                <option value="{{ $j }}" selected>{{ $j }}</option>
                @else
                <option value="{{ $j }}">{{ $j }}</option>
                @endif
                @endforeach
            </select>
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Min. Masa Kerja</label>
        <div class="input-group">
            <input type="text" class="form-control @error('min_masa_kerja') is-invalid @enderror" name="min_masa_kerja" value="{{ old('min_masa_kerja', $item->min_masa_kerja) }}">
            <div class="input-group-append">
                <span class="input-group-text">Tahun</span>
            </div>
        </div>
        @error('min_masa_kerja')
        <div class="invalid-feedback ml-3">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group col-md-6">
        <label>Max. Masa Kerja</label>
        <div class="input-group">
            <input type="text" class="form-control @error('max_masa_kerja') is-invalid @enderror" name="max_masa_kerja" value="{{ old('max_masa_kerja', $item->max_masa_kerja) }}">
            <div class="input-group-append">
                <span class="input-group-text">Tahun</span>
            </div>
        </div>
        @error('max_masa_kerja')
        <div class="invalid-feedback ml-3">{{ $message }}</div>
        @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label>Gaji Pokok</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                </div>
                <input type="text" class="form-control @error('gaji_pokok') is-invalid @enderror" name="gaji_pokok" value="{{ old('gaji_pokok', $item->gaji_pokok) }}">
                </div>
            </div>
            @error('gaji_pokok')
            <div class="invalid-feedback ml-3">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Status</label>
            <select name="status" class="form-control @error('status') is-invalid @enderror">
                <option value="" selected>Pilih..</option>
                @foreach($status as $s)
                @if(old('status', $item->status) == $s)
                <option value="{{ $s }}" selected>{{ $s }}</option>
                @else
                <option value="{{ $s }}">{{ $s }}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-sm"></i> Save</button>
        </div>
        </div>
    </div>
    </div>

</form>
@endforeach