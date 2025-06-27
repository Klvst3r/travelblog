{{-- <div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
</div> --}}


<table id="{{ $id }}" class="table table-striped dt-indice responsive" style="width:100%">    
  <thead>
    {{ $thead }}
  </thead>
  <tbody>
    {{ $slot }}
  </tbody>
</table>

@once
  @push('scripts')
    <script src="{{ asset('js/dt-init.js') }}"></script>
  @endpush
@endonce

