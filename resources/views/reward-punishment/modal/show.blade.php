@foreach($dataRewardPunishment as $item)

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
                        <th>Status</th>
                        <td> : </td>
                        <td>{{ $item->status }}</td>
                    </tr>
                    <tr>
                        <th>Nama Bentuk</th>
                        <td> : </td>
                        <td>{{ $item->nama_bentuk }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal SK</th>
                        <td> : </td>
                        <td>{{ $item->tanggal }}</td>
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
                            <table id="myTable" class="table-bordered" width="100%">
                                <?php $no = 1; ?>
                                @foreach($dataPenerima as $dp)
                                @if($dp->status === $item->status && $dp->nama_bentuk === $item->nama_bentuk)
                                <tr>
                                    <td>
                                        {{ $no++ . '. ' . $dp->pegawai->nip . ' - ' . $dp->pegawai->nama }} <br>
                                    </td>
                                    <td>
                                        <form action="{{ route('destroyRewardPunishment', $dp->id) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge badge-danger badge-sm border-0" onclick="return confirm('Apakah kamu yakin?')" style="width:100%"><i class="fas fa-trash fa-sm"></i></button>
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