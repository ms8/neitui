    <tr>
        <td><?php echo $data->id?></td>
        <td><?php echo $data->name?></td>
        <td><?php echo $data->website?></td>
        <td><?php echo $data->email?></td>
        <td><?php echo $data->address?></td>
        <td><a href="#" onclick="deleteCompany(<?php echo $data->id?>)">删除</a></td>
        <td><a href="#" onclick="weightCompany(<?php echo $data->id?>)">上首页</a></td>
    </tr>

