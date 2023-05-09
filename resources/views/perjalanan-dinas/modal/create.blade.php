<form action="{{ route('storePerjalananDinas') }}" method="POST">
    @csrf

    <div class="modal fade" id="createModal">
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
                            <label>Keperluan</label>
                            <input type="text" class="form-control @error('keperluan') is-invalid @enderror" name="keperluan" value="{{ old('keperluan') }}">
                            @error('keperluan')
                            <div class="invalid-feedback ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Anggaran</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                </div>
                                <input type="text" name="anggaran" class="form-control @error('anggaran') is-invalid @enderror" x aria-describedby="basic-addon1">
                            </div>
                            @error('anggaran')
                            <div class="invalid-feedback ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tempat Tujuan</label>
                            <input type="text" class="form-control @error('tempat_tujuan') is-invalid @enderror" name="tempat_tujuan" value="{{ old('tempat_tujuan') }}">
                            @error('tempat_tujuan')
                            <div class="invalid-feedback ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Alat Transportasi</label>
                            <input type="text" class="form-control @error('alat_transportasi') is-invalid @enderror" name="alat_transportasi" value="{{ old('alat_transportasi') }}">
                            @error('alat_transportasi')
                            <div class="invalid-feedback ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tanggal Berangkat</label>
                            <input type="date" class="form-control @error('tanggal_berangkat') is-invalid @enderror" name="tanggal_berangkat" value="{{ old('tanggal_berangkat') }}">
                            @error('tanggal_berangkat')
                            <div class="invalid-feedback ml-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Kembali</label>
                            <input type="date" class="form-control @error('tanggal_berangkat') is-invalid @enderror" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}">
                            @error('tanggal_kembali')
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