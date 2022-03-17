<tr>
<td>
<table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell" align="center">
    <ul style="display: flex; justify-content: space-around;">
        <li style="list-style: none; margin-left: 5px;"><a style="font-size: 14px;" href="mailto:{{env('ADMIN_EMAIL')}}">Write us a review</a></li>
        <li style="margin-left: 5px;"><a style="font-size: 14px;" href="{{route('faq')}}">Frequently Asked Questions</a></li>
        <li style="margin-left: 5px"><a style="font-size: 14px;" href="#">Terms & Conditions</a></li>
    </ul>
{{ Illuminate\Mail\Markdown::parse($slot) }}
</td>
</tr>
</table>
</td>
</tr>
