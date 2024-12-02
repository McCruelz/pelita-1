@props(['active' => false])

<a {{$attributes}}
   @class([
    //    'rounded-md px-3 py-2 text-sm font-medium',
       'text-black font-bold' => $active,
       'text-black hover:font-semibold' => !$active,
   ])
   aria-current="{{ $active ? 'page' : false }}">
    {{$slot}}
</a>
