@foreach($dataPelatihan as $item)

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

                <table class="table">
                    <tr>
                        <th>Nama Pelatihan</th>
                        <td> : </td>
                        <td>{{ $item->nama_pelatihan }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Mulai</th>
                        <td> : </td>
                        <td>{{ $item->tanggal_mulai }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Berakhir</th>
                        <td> : </td>
                        <td>{{ $item->tanggal_berakhir }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td> : </td>
                        @if(date('d F Y', strtotime($item->tanggal_berakhir)) <= date('d F Y', strtotime(now()))) <td>
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
                        <th>Sifat Pelatihan</th>
                        <td> : </td>
                        <td>{{ $item->sifat_pelatihan }}</td>
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
                            <table id="myTable" class="table-borderless" width="100%">
                                <?php $no = 1; ?>
                                @foreach($dataPesertaPelatihan as $dp)
                                @if($dp->nama_pelatihan === $item->nama_pelatihan && $dp->sifat_pelatihan === $item->sifat_pelatihan && $dp->tanggal_mulai === $item->tanggal_mulai && $dp->tanggal_berakhir === $item->tanggal_berakhir)
                                <tr>
                                    <td>
                                        {{ $no++ . '. ' . $dp->pegawai->nip . ' - ' . $dp->pegawai->nama }} <br>
                                    </td>
                                    <td>
                                        <form action="{{ route('destroyPerjalananDinas', $dp->id) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin?')" style="width:100%"><i class="fas fa-trash fa-sm"></i></button>
                                        </form>
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