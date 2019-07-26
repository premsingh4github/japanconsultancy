<div class="graduation_prospect_certificate">
    <div class="container">
        <style>
            .graduation_prospect_certificate_main strong {
                margin-left: 8px;
            }
            .graduation_prospect_certificate_main b {
                margin-left: 25px;
            }
            h1.graduation_prospect_certificate_h2 {
                margin-bottom: 55px;
            }
            .graduation_prospect_certificate_main li{
                list-style: none;
            }
        </style>
        <div class="row">
            <div class="graduation_prospect_certificate_main" style="padding:10px 80px;">
                <img src="{{url('public/images/logo/logo.png')}}" alt="">
                <ul>
                    <li>
                        <p><b style="margin-right: 360px;">INVOICE</b>
                            {{ date('d') }}/
                            {{ date('m') }}/
                            {{ date('Y') }}</p>
                    </li>
                    <li>
                        <p>
                            This is to certify that the following student has been matriculated to our Central Art School
                            And to request students tuition fees remittance.

                        </p>
                    </li>
                    <li>
                        <p>Name : &nbsp; &nbsp;<b>{{$student->last_student_name}} {{$student->first_student_name	}}</b></p>
                        <p>Date of birth : <strong>{{$student->date_of_birth}}</strong></p>
                        <p>Faculty   　: Art business course</p>
                        <p>Level　　　　: Diploma</p>
                        <p>(full time, credits obtainable )</p>
                    </li>
                    <li>
                        Duration of the course   :2 year, starting in April 2019,until march 2021
                        Please remit750,000JPY for tuition fees to the following designated bank account.
                        The amount  is for the first time payment of first year installments
                    </li>
                    <li>
                        <table width="100%" border="2" align="center" cellpadding="10" cellspacing="0" style="border:solid 1px #000;">

                            <tbody>
                            <tr>
                                <td>Name of bank </td>
                                <td>SWIFT code</td>
                                <td>Branch </td>
                                <td>Account No </td>
                                <td>Account name </td>
                            </tr>
                            <tr>
                                <td>Sumitomo Mitsui Banking Corporation </td>
                                <td>SMBCJPJT</td>
                                <td>Musasiseki Branch </td>
                                <td>Saving account 4045381</td>
                                <td>Gakkouhoujin Koriyamagakuen Chuobijutsugakuen</td>
                            </tr>
                            </tbody>
                        </table>
                    </li>
                    <li>
                       <p> <b>Address of bank :</b> 2-27-5 sekimachikita, nerima-ku,Tokyo japan</p>
                        <p>※ Please make sure to take into account about international transaction fee, and that Central Art School will receive full amount mentioned above </p>
                        <p>※ Please transfer with students name and personal identifying number for admission shown above　as a payerGakkouhoujin Koriyamagakuen Chuobijutsugakuen is an educational corporation runs Central Art School thus the Central Art School account name is Gakkouhoujin Koriyamagakuen Chuobijutsugakuen</p>
                    </li>
                    <li>
                        <p>Instalment plan</p>
                        <table width="100%" border="2" align="center" cellpadding="10" cellspacing="0" style="border:solid 1px #000;">

                            <tbody>
                            <tr>
                                <td>FirstInstalment</td>
                                <td>Second Instalment</td>
                                <td>Third Instalment </td>
                            </tr>
                            <tr>
                                <td>300000yen</td>
                                <td>250000yen</td>
                                <td>250000yen</td>
                            </tr>
                            </tbody>
                        </table>
                    </li>
                    <li>
                        <p>
                            Payment deadline: March 23rd 2019 <br>
                            If you have any questions please don't hesitate to contact us we would appreciate your cooperation
                            Thank you

                        </p>
                    </li>
                    <li>
                        <p>Official seal of president     <b>KHADKA ENDRA BAHADUR </b></p>
                        <hr>
                    </li>
                    <li>
                        <p>Admissions OfficialCentral Art SchoolTokyotonerimaku sekimachikita2-34-12 <br>
                            　　 Tel:{+81: 0339291230 fax:{+81: 0359917236
                        </p>
                    </li>
                </ul>
                　　　　            </div>
        </div>
    </div>
</div>