@props(['dinners'])
@foreach ($dinners as $dinner)
<div class="col-md-6 col-lg-3">
  <div class="card">
    <h5 class="text-center bg-gray-200 p-2">{{ $dinner->name }}</h5>
    <img src="{{ Storage::url($dinner->image) }}" class="">

    <h6 class=" text-center bg-gray-300 py-2 ">{{ $dinner->description }}</h6>

  </div>
</div>
@endforeach 