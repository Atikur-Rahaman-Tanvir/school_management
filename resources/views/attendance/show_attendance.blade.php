

<table>
    <th>Student</th>
    <th>01</th>
    <th>02</th>
    <th>03</th>
    <th>04</th>
    <th>05</th>
    <th>06</th>
    <th>07</th>
    <th>08</th>
<tbody>
@foreach($data as $data)
    <tr class="odd gradeX">
      <td> {{$data->student}} </td>
        <?php
        $dateaa = explode(',', $data->date_att);
        $attendance = explode(',', $data->atten);
        // $daysInMonth = cal_days_in_month(CAL_GREGORIAN,$month, $year);
        $daysInMonth = '30';
        for($i=1; $i<=$daysInMonth; $i++)
        {
         $db_date = $data->date_att;
         $resultDate = sprintf('%02d', $i);
         $date1 = '2022'.'-'.'09'.'-'.$resultDate;
         if($i==$db_date[2])
         {
           $x = 0;
           foreach($attendance as $key=>$value)
           {
             $x++;
             if($x==$key+1)
             {
                if($value=="1")
                {
                  $status = "P";
                  ?><td><?php echo $status; ?></td><?php
                }
                else
                {
                  $status = "A";
                  ?><td><?php echo $status; ?></td><?php
                }
              }
              else
              {
               //echo $x;
              }
          }
       }
       else
       {
          //echo $i;
       }
     }
     ?>
     {{-- <td> 25 </td> --}}
     </tr>
    @endforeach

</tbody>
</table>
