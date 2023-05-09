<form action="/riwayat-jabatan" method="POST" enctype="multipart/form-data">
@csrf

    <div class="modal fade" tabindex="-1" id="createModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Form Input {{ $title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

        <div class="form-row">
            <div class="form-group col-md-12">
                <label>NIP</label>
                <input type="search" id="nip" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}">
                @error('nip')
                <div class="invalid-feedback ml-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Bidang</label>
                <select id="bidang_id" name="bidang_id" class="form-control @error('bidang_id') is-invalid @enderror">
                    <option value="" selected>Pilih..</option>
                    @foreach($data_bidang as $item)
                    @if(old('bidang_id') == $item->id)
                    <option value="{{ $item->id }}"  selected>{{ $item->nama_bidang }}</option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->nama_bidang }}</option>
                    @endif
                    @endforeach
                </select>
                @error('bidang_id')
                <div class="invalid-feedback ml-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label>Jabatan</label>
                <select id="jabatan_id" name="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror">
                    <option value="" selected>Pilih..</option>
                </select>
                @error('jabatan_id')
                <div class="invalid-feedback ml-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 ">
                <label>Golongan</label>
                <select id="golongan_id" name="golongan_id" class="form-control @error('golongan_id') is-invalid @enderror">
                    <option value="" selected>Pilih..</option>
                </select>
                @error('golongan_id')
                <div class="invalid-feedback ml-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label>TMT Golongan</label>
                <input type="date" id="tmt_golongan" class="form-control @error('tmt_golongan') is-invalid @enderror" name="tmt_golongan" value="{{ old('tmt_golongan') }}">
                @error('tmt_golongan')
                <div class="invalid-feedback ml-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label>TMT Bekerja</label>
                <input type="date" id="tmt_bekerja" class="form-control @error('tmt_bekerja') is-invalid @enderror" name="tmt_bekerja" value="{{ old('tmt_bekerja') }}">
                @error('tmt_bekerja')
                <div class="invalid-feedback ml-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
            <label>Upload Scan SK</label>
            <input type="file"  class="form-control @error('scan_sk') is-invalid @enderror" name="scan_sk" value="{{ old('scan_sk') }}">
            </div>
        </div>
        <div class="form-row">
        <div class="col">
        <button type="submit" class="btn btn-primary mt-3" style="width:100%">Submit</button>
        </div>
        </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

</form>