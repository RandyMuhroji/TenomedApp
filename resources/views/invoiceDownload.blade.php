
<!DOCTYPE html>
<!--
  Invoice template by invoicebus.com
  To customize this template consider following this guide https://invoicebus.com/how-to-create-invoice-template/
  This template is under Invoicebus Template License, see https://invoicebus.com/templates/license/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Easy (corporate)</title>
 <style type="text/css">
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font: inherit;
  font-size: 100%;
  vertical-align: baseline;
}

html {
  line-height: 1;
}

ol, ul {
  list-style: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

caption, th, td {
  text-align: left;
  font-weight: normal;
  vertical-align: middle;
}

q, blockquote {
  quotes: none;
}
q:before, q:after, blockquote:before, blockquote:after {
  content: "";
  content: none;
}

a img {
  border: none;
}

article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
  display: block;
}

/* Invoice styles */
/**
 * DON'T override any styles for the <html> and <body> tags, as this may break the layout.
 * Instead wrap everything in one main <div id="container"> element where you may change
 * something like the font or the background of the invoice
 */
html, body {
  /* MOVE ALONG, NOTHING TO CHANGE HERE! */
}

/** 
 * IMPORTANT NOTICE: DON'T USE '!important' otherwise this may lead to broken print layout.
 * Some browsers may require '!important' in oder to work properly but be careful with it.
 */
.clearfix {
  display: block;
  clear: both;
}

.x-hidden {
  display: none !important;
}

.hidden {
  display: none;
}

b, strong, .bold {
  font-weight: bold;
}

#container {
  font: normal 13px/1.4em 'Open Sans', Sans-serif;
  margin: 0 auto;
  min-height: 1158px;
  position: relative;
  padding: 0px;
}

.left-stripes {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  width: 100px;
  background: url("../../public/images/stripe-bottom.png") center bottom no-repeat, url("../../public/images/stripe-bg.jpg") repeat;
}
.left-stripes .circle {
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  background: #415472;
  width: 30px;
  height: 30px;
  position: absolute;
  left: 33%;
}
.left-stripes .circle.c-upper {
  top: 440px;
}
.left-stripes .circle.c-lower {
  top: 690px;
}

.right-invoice {
  padding: 40px 30px 40px 130px;
  min-height: 1078px;
}

#memo .company-info {
  float: left;
}
#memo .company-info div {
  font-size: 28px;
  text-transform: uppercase;
  min-width: 20px;
  line-height: 1em;
}
#memo .company-info span {
  font-size: 12px;
  color: #858585;
  display: inline-block;
  min-width: 20px;
}
#memo .logo {
  float: right;
  margin-left: 15px;
}
#memo .logo img {
  width: 150px;
}
#memo:after {
  content: '';
  display: block;
  clear: both;
}

#invoice-title-number {
  margin: 50px 0 20px 0;
  display: inline-block;
  float: left;
}
#invoice-title-number .title-top {
  font-size: 15px;
  margin-bottom: 5px;
}
#invoice-title-number .title-top span {
  display: inline-block;
  min-width: 20px;
}
#invoice-title-number .title-top #number {
  text-align: right;
  float: right;
  color: #858585;
}
#invoice-title-number .title-top:after {
  content: '';
  display: block;
  clear: both;
}
#invoice-title-number #title {
  display: inline-block;
  background: #415472;
  color: white;
  font-size: 50px;
  padding: 7px;
  font-family: Sanchez, Serif;
  line-height: 1em;
}

#client-info {
  float: right;
  text-align: right;
  margin-top: 50px;
  min-width: 220px;
}
#client-info .client-name {
  font-weight: bold;
  font-size: 15px;
  text-transform: uppercase;
  margin: 7px 0;
}
#client-info > div {
  margin-bottom: 3px;
  min-width: 20px;
}
#client-info span {
  display: block;
  min-width: 20px;
}
#client-info > span {
  text-transform: uppercase;
  color: #858585;
  font-size: 15px;
}

table {
  table-layout: fixed;
}
table th, table td {
  vertical-align: top;
  word-break: keep-all;
  word-wrap: break-word;
}

#invoice-info {
  float: left;
  margin-top: 10px;
}
#invoice-info div {
  margin-bottom: 3px;
}
#invoice-info div span {
  display: inline-block;
  min-width: 20px;
  min-height: 18px;
}
#invoice-info div span:first-child {
  font-weight: bold;
  text-transform: uppercase;
  margin-right: 10px;
}
#invoice-info:after {
  content: '';
  display: block;
  clear: both;
}

.currency {
  margin-top: 20px;
  text-align: right;
  color: #858585;
  font-style: italic;
  font-size: 12px;
}
.currency span {
  display: inline-block;
  min-width: 20px;
}

#items {
  margin-top: 10px;
}
#items .first-cell, #items table th:first-child, #items table td:first-child {
  width: 18px;
  text-align: right;
}
#items table {
  border-collapse: separate;
  width: 100%;
}
#items table th {
  font-family: Sanchez, Serif;
  font-size: 12px;
  text-transform: uppercase;
  padding: 5px 3px;
  text-align: right;
  background: #b0b4b3;
  color: white;
}
#items table th:nth-child(2) {
  width: 30%;
  text-align: left;
}
#items table th:last-child {
  text-align: right;
}
#items table td {
  padding: 10px 3px;
  text-align: right;
  border-bottom: 1px solid #ddd;
}
#items table td:first-child {
  text-align: left;
}
#items table td:nth-child(2) {
  text-align: left;
}

#sums {
  float: right;
  margin-top: 30px;
}
#sums table tr th, #sums table tr td {
  min-width: 100px;
  padding: 8px 3px;
  text-align: right;
}
#sums table tr th {
  padding-right: 25px;
}
#sums table tr.amount-total td {
  background: #415472;
  color: white;
  font-family: Sanchez, Serif;
  font-size: 35px;
  line-height: 1em;
  padding: 7px !important;
}
#sums table tr.due-amount th, #sums table tr.due-amount td {
  font-weight: bold;
}

#terms {
  margin-top: 60px;
}
#terms > span {
  font-weight: bold;
  display: inline-block;
  min-width: 20px;
  text-transform: uppercase;
}
#terms > div {
  min-height: 50px;
  min-width: 50px;
}

.payment-info {
  font-size: 12px;
  color: #858585;
  margin-top: 30px;
}
.payment-info div {
  min-width: 20px;
}
.payment-info div:first-child {
  font-weight: bold;
}

.ib_invoicebus_fineprint {
  text-align: left !important;
  padding-left: 130px !important;
  width: auto !important;
}


 </style>

  </head>
  <body>
    <div id="container">
      
        <section id="memo"><!-- 
         <div class="logo">
            <img src="{{ asset('') }}images/duku.png" />
          </div> -->
          <div class="company-info">
            <div>TENOMED - Tempat Nongkrong Medan</div>
            <br>
            <span>Jln. Pukat Banting IV 81 Medan Tembung</span>
            <span>Medan</span>
            <br>
            <span>+62821-6115-1070</span>
            <br>
            <span>tenomed01@gmail.com</span>
          </div>

         
        </section>

        <section id="invoice-title-number">

        
          <div id="title">Invoice Reservation cafe</div>
          
        </section>

        <section id="client-info">
          <span>Client Detail</span>
          <div class="client-name">
            <span> {{Auth::user()->name}}</span>
          </div>
          
          <div>
            <span>{{Auth::user()->email}}</span>
          </div>
          
           <span>Booking Name</span>
          <div class="client-name">
            <span> {{$detail->name}}</span>
          </div>
          

        </section>
        
        <div class="clearfix"></div>
        
        <section id="invoice-info">
          <div>
            <span>Booking Code :</span> <span>RSVS29358745</span>
          </div>
          <div>
            <span>Booking Date :</span> <span>{{$detail->bookingDate}}</span>
          </div>
          <div>
            <span>Booking Time :</span> <span>{{$detail->bookingTime}}</span>
          </div>
        </section>
        
        <div class="clearfix"></div>

        
        <section id="items">
          
          <table cellpadding="0" cellspacing="0">
          
            <tr>
                <th width="20">#</th>
                <th>Item</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Cost</th>
                <th>Total</th>
            </tr>
            
           {{$subttl=0}}

            {{$i=0}}
            @foreach($menu as $menus)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$menus->name}}</td>
                    <td>{{$menus->desc}}</td>
                    <td>{{$menus->qunatity}}</td>
                    <td>Rp. {{$menus->price}}</td>
                    <td>Rp. {{$menus->qunatity*$menus->price}}</td>
                    {{$subttl=$subttl+$menus->qunatity*$menus->price}}
                    {{$i=$i+1}}
                </tr>
           @endforeach
            
          </table>
          
        </section>
        
        <section id="sums">
        
          <table cellpadding="0" cellspacing="0">
            <tr>
              <th>Sub - Total amount:</th>
              <td>Rp. {{$subttl}}</td>
            </tr>
            
            <tr data-iterate="tax">
              <th>Grand Total:</th>
              <td>Rp. {{$subttl}}</td>
            </tr>
            
            <tr class="amount-total">
              <!-- {amount_total_label} -->
              <td colspan="2">Rp. {{$subttl}}</td>
            </tr>
            
            <!-- You can use attribute data-hide-on-quote="true" to hide specific information on quotes.
                 For example Invoicebus doesn't need amount paid and amount due on quotes  -->
           
            
          </table>
          
        </section>
        
        <div class="clearfix"></div>
        
        <section id="terms">
        
          <span>Terms</span>
          <div><span style="text-transform: capitalize;">{{Auth::user()->name}}</span>, thank you very much. We really appreciate your business. </div>
          
        </section>

        <div class="payment-info">
          <div>Payment Info</div>
          <div></div>
          <div><strong>Rekeneing :</strong> 10927836</div>
          <div><strong>Atas Nama :</strong> TENOMED BANK</div>
        </div>
    </div>

  </body>
</html>
