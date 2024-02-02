<x-mail::message>

# Resumen del pedido

@component('mail::table')

<div style="margin: 20px;0px;">
<table >
<tr>
<td>Habitacion</td>
<td class="last">
{{ $reservation->data->room->name }}
</td>
</tr>
<tr>
<td>Adultos</td>
<td class="last">{{ $reservation->adults }}</td>
</tr>
<tr>
<td>Noches</td>
<td class="last">{{ $reservation->nights }}</td>
</tr>
<tr>
<td>Fehca llegada</td>
<td class="last">
{{ $reservation->start_date->isoFormat('DD MMM YYYY') }}
</td>
</tr>
<tr>
<td>Fecha Salida</td>
<td class="last">
{{ $reservation->end_date->isoFormat('DD MMM YYYY') }}
</td>
</tr>
<tr>
<td>Precio por noche</td>
<td class="last">@money($reservation->price)</td>
</tr>
</table>
<div style="border-top: 1px #ccc solid"></div>
<table>
<tr>
<td class="first pt-">
Precio por {{ $reservation->nights }} noche(s)
</td>
<td class="last">
@money($reservation->sub_total)
</td>
</tr>
@if ($reservation->offer)
<tr>
<td>Oferta ({{ $reservation->offer->percent }}%)</td>
<td class="last">
@money($reservation->offer->offerAmount)
</td>
</tr>
@endif
<tr>
<td>Sub total</td>
<td class="last">
@money($reservation->offer->priceTotalOffer)
</td>
</tr>
<tr>
<td>IVA ({{ $reservation->tax_percent }}%)</td>
<td class="last">
@money($reservation->tax_amount)
</td>
</tr>
<tr class="total" style="font-size: 20px;">
<td>Total</td>
<td class="last">
@money($reservation->total)
</td>
</tr>
</table>
</div>
@endcomponent
Gracias por preferirnos, nos vemos pronto,
<br />

</x-mail::message>
