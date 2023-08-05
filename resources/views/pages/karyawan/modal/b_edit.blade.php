<button onclick="categoryEdit('{{ route('karyawan.edit', $data->id) }}')" type="button" class="btn btn-sm btn-info" >Edit</button>
<a href="{{ route('karyawan.detail', $data->id) }}" type="button" class="btn btn-sm btn-secondary" >Detail</a>
{{-- <a href="{{ route('karyawan.detail', $data->id) }}" type="button" class="btn btn-sm btn-secondary" >Detail</a> --}}
<form action="{{ route('karyawan.delete', $data->id) }}" method="POST" style="display: inline-block">
    @csrf
    <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
</form>
