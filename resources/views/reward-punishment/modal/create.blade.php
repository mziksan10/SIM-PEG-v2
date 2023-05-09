<form action="{{ route('storeRewardPunishment') }}" method="POST" enctype="multipart/form-data">
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
                            <label>Status</label>
                            @foreach($status as $item)
                            <div class="form-control form-check mb-2" style="width: 100%;">
                                <input type="radio" class="form-check-input @error('status') is-invalid @enderror ml-1" name="status" value="{{ $item }}"><label class="form-check-label ml-4">{{ $item }}</label>
                            </div>
                            @endforeach
                            @error('status')
                            <div class="invalid-feedback ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Nama Bentuk</label>
                            <input type="text" class="form-control @error('nama_bentuk') is-invalid @enderror" name="nama_bentuk" value="{{ old('nama_bentuk') }}">
                            @error('nama_bentuk')
                            <div class="invalid-feedback ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tanggal SK</label>
                            <input type="date" class="form-control @error('tanggal_sk') is-invalid @enderror" name="tanggal_sk" value="{{ old('tanggal_sk') }}">
                            @error('tanggal_sk')
                            <div class="invalid-feedback ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Upload Scan SK</label>
                            <input type="file" class="form-control @error('scan_sk') is-invalid @enderror" name="scan_sk">
                            @error('scan_sk')
                            <div class="invalid-feedback ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Pegawai</label>
                            <select name="pegawai_id[]" multiple="multiple" class="select2-multiple form-control" style="height: 500px;">
                                @foreach($dataPegawai as $item)
                                <option value="{{ $item->id }}">{{$item->nip . " - " . $item->nama}}</option>
                                @endforeach
                            </select>
                            @error('pegawai_id')
                            <div class="invalid-feedback ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 col-md-6">
                            <button type="reset" class="btn btn-secondary" style="width:100%"><i class="fas fa-redo"></i> Reset</button>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <button type="submit" class="btn btn-primary" style="width:100%"><i class="fas fa-paper-plane"></i> Submit</button>
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