@foreach($dataPerjalananDinas as $item)

<div class="modal fade" tabindex="-1" id="showModal{{ $item->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class="table mb-0">
                    <tr>
                        <th>Keperluan</th>
                        <td> : </td>
                        <td>{{ $item->keperluan }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Tujuan</th>
                        <td> : </td>
                        <td>{{ $item->tempat_tujuan }}</td>
                    </tr>
                    <tr>
                        <th>Alat Transportasi</th>
                        <td> : </td>
                        <td>{{ $item->alat_transportasi }}</td>
                    </tr>
                    <tr>
                        <th>Anggaran</th>
                        <td> : </td>
                        <td>{{ 'Rp. ' . number_format($item->anggaran, 2,',','.') }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Berangkat</th>
                        <td> : </td>
                        <td>{{ $item->tanggal_berangkat }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Kembali</th>
                        <td> : </td>
                        <td>{{ $item->tanggal_kembali }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td> : </td>
                        @if(date('d F Y', strtotime($item->tanggal_kembali)) <= date('d F Y', strtotime(now()))) <td>
                            <div class="badge badge-success">Selesai
                            </div>
                            </td>
                            @else
                            <td>
                                <div class="badge badge-warning">Belum Selesai</div>
                            </td>
                            @endif
                    </tr>
                    <tr>
                        <th>Jumlah Pegawai</th>
                        <td>:</td>
                        <td>{{ $item->total }} Org.</td>
                    </tr>
                    <tr>
                        <th>
                            Daftar Pegawai
                        </th>
                        <td colspan="2">:</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="font-size: x-small;">
                            <table class="table-borderless" width="100%">
                                <?php $no = 1; ?>
                                @foreach($dataPegawaiPerjalananDinas as $dp)
                                @if($dp->keperluan === $item->keperluan && $dp->tempat_tujuan === $item->tempat_tujuan && $dp->tanggal_berangkat === $item->tanggal_berangkat)
                                <tr>
                                    <td>
                                        {{ $no++ . '. ' . $dp->pegawai->nip . ' - ' . $dp->pegawai->nama }} <br>
                                    </td>
                                    <td>
                                        <small>
                                            <form action="{{ route('destroyPerjalananDinas', $dp->id) }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="badge badge-sm badge-danger" onclick="return confirm('Apakah kamu yakin?')" style="width:100%"><i class="fas fa-trash fa-sm"></i></button>
                                            </form>
                                        </small>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endforeach