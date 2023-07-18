
<body style="margin: 0; padding: 0; background-color: #f5f5f5; font-family: Arial, sans-serif;">
    <div class="title" style="background: 006544: color:#fff; padding:.6em ;">
    <h5 style="font-size: 24px; font-weight:600;">AA Automart Welcome</h5>
    </div>
	<table cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; text-align:center border: 1px solid #dddddd;">
		<tr>
			<td style="padding: 20px;">
				<p>Thank you for making payment of <strong>{{ number_format($amount,2) }}</strong> for your subscription on {{ $aubscription }} starting {{ $starting }} and ending on {{ $end_date }}.</p>
				<p>In effect your vehicles are promoted and will get the best listings based on the package you have subscribed to. </p>
                <p>
                    Thank you
                </p>
                <br><br><br>
                <p>Automart @ AA Kenya Limited</p>
            </td>
		</tr>
	</table>
</body>
