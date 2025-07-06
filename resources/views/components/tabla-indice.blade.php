{{-- <div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
</div> --}}

@props(['id', 'createurl' => null])

{{-- DEBUG --}}
{{-- <div style="background: yellow; padding: 10px;">
  Valor recibido en createurl: {{ $createurl ?? 'NULO' }}
</div> --}}

<table
    id="{{ $id }}"
    class="table table-striped dt-indice responsive tabla-con-agregar"
    style="width:100%"
    data-create-url="{{ $createurl }}"
>
  <thead>{{ $thead }}</thead>
  <tbody>{{ $slot }}</tbody>
</table>

@once
  @push('scripts')
    <script src="{{ asset('js/dt-init.js') }}"></script>
  @endpush
@endonce

