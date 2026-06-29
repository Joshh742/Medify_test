<script>
$(document).ready(function() {
    function loadData() {
        $.ajax({
            url: "{{ url('kategori-items/search') }}",
            type: 'GET',
            data: {
                nama: $('#filter_nama').val(),
                kode: $('#filter_kode').val()
            },
            success: function(response) {
                let html = '';
                response.data.forEach(function(item) {
                    html += `<tr>
                        <td>${item.kode}</td>
                        <td>${item.nama}</td>
                        <td><a href="{{ url('kategori-items/view') }}/${item.id}" class="btn btn-sm btn-info">Detail</a></td>
                    </tr>`;
                });
                $('#table-kategori tbody').html(html);
            }
        });
    }

    $('#btn-filter').click(loadData);
    loadData(); // Load otomatis saat pertama kali dibuka
});
</script>