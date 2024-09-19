<!DOCTYPE html>
<html>
<head>
    <title>Rent Invoice</title>

    <link rel="stylesheet" href="{{asset('resources/dist/css/invoice.css')}}">
</head>
<body>
    
<table class="body-wrap">
        <tbody><tr>
            <td></td>
            <td class="container" width="600">
                <div class="content">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0">
                        <tbody><tr>
                            <td class="content-wrap aligncenter">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>                                        
                                        <td class="content-block" style="text-align:center;" >
                                            <h2>Rent Invoice</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="content-block">
                                            <table class="invoice">
                                                <tbody>
												<tr>
                                                    <td><b>Name :</b> {{ optional($rentcollection->renterinfo)->name }}<br> 
                                                        <b>Address :</b> {{ optional($rentcollection->renterinfo)->address }}<br>                                                  
														<b>Mobile :</b>{{ optional($rentcollection->renterinfo)->mobile }}<br>													      
													</td>												
                                                </tr>
                                                <tr>                                                   
													<td><b>Month: </b>{{ $rentcollection->month }} ,  {{ $rentcollection->year }}<br>
													    <b>Building: </b>{{optional($rentcollection->buildinginfo)->name}}<br>
														<b>Flat: </b>{{ optional($rentcollection->flatinfo)->name}}													  
													</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                               <tr class="total">
																	<td class="alignleft" width="80%">Type</td>
																	<td class="alignright">Amount</td>
																</tr>
																<tr>
																	<td><b>Rent Amount</b></td>
																	<td class="alignright">{{ $rentcollection->rent_amt }}</td>
																</tr>
																<tr>
																	<td><b>Electric Bill</b></td>
																	<td class="alignright">{{ $rentcollection->electric_bill }}</td>
																</tr>
																<tr>
																	<td><b>Gas Bill</b></td>
																	<td class="alignright">{{ $rentcollection->gas_bill }}</td>
																</tr>
																<tr>
																	<td><b>Others Bill</b></td>
																	<td class="alignright">{{ $rentcollection->others_bill }}</td>
																</tr>
																<tr class="total">
																	<td class="alignright" width="80%">Total</td>
																	<td class="alignright">{{ (int)$rentcollection->rent_amt +  (int)$rentcollection->electric_bill + (int)$rentcollection->gas_bill + (int)$rentcollection->others_bill }}</td>
																</tr>
                                                            </tbody>
														
														</table>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td >										
													</td>
													
                                                </tr>
												<tr>
                                                    <td >													
													</td>													
                                                </tr>
												<tr>
                                                    <td><b>Collect By :</b> {{ optional($rentcollection->updateby)->name }}
													
													</td>													
                                                </tr>
                                                <tr>                                                   
													
													<td><b>Collect Date:</b> {{ \Carbon\Carbon::parse($rentcollection->created_at)->format('d/m/Y')}} 
													
													</td>
                                                </tr>
                                            </tbody>
											
											</table>
                                                                                       
                                        </td>
                                    </tr>
                                    
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody></table>
                  </div>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>
</body>
</html>