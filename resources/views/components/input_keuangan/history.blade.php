<div class="card-body p-0">
    <table class="table" id="history-pemasukan">
        <tbody>
            @foreach ($histories as $history)
                <tr>
                    <td><span class="badge badge-success">{{ $history->jenis_pemasukan }}</span></td>
                    <td>Rp. {{ number_format($history->jumlah) }}</td>
                    <td>{{ $history->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>