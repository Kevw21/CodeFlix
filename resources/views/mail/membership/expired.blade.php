<x-mail::message>
# Hello, {{ $membership->user->name }}!

Your Codeflix membership has expired.

Expired Date: {{ $expiredDate }}

<x-mail::button :url="$renewUrl">
	Renew Membership
</x-mail::button>

Please renew your membership to continue enjoying our services.
Thank you for using our application!

Regards,<br>
{{ config('app.name') }}
</x-mail::message>
