<div>
        <table>
        <tr>
                <td class="headcol">1</td>
                <td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td>
                <td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td>
        </tr>
        <tr>
                <td class="headcol">2</td>
                <td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td>
                <td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td>
        </tr>
        <tr><td class="headcol">3</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td></tr>
        <tr><td class="headcol">4</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td></tr>
        <tr><td class="headcol">5</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td></tr>
        <tr><td class="headcol">6</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td></tr>
        <tr><td class="headcol">7</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td></tr>
        <tr><td class="headcol">8</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td></tr>
        <tr><td class="headcol">9</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td><td class="long">QWERTYUIOPASDFGHJKLZXCVBNM</td></tr>
        </table>
</div>

<style type="text/css">
        body { font:16px Calibri;}
        table { border-collapse:separate; border-top: 3px solid #333; }
        td {
            margin:0;
            border:3px solid #333; 
            border-top-width:0px; 
            white-space:nowrap;
        }
        div { 
            width: 600px; 
            overflow-x:scroll;  
            padding-left:5em; 
            overflow-y:visible;
            padding-bottom:1px;
        }
        .headcol {
            position:absolute; 
            width:5em; 
            left:0;
            top:auto;
            border-right: 0px solid #333; 
            border-top-width:0px; /*only relevant for first row*/
            margin-top:-3px; /*compensate for top border*/
            overflow:hidden;
            background-color : #fff;
        }
        .headcol:before {content: 'Row ';}
        .long { background:yellow; letter-spacing:1em; } 
</style>