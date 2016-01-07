<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta charset="UTF-8"/>
 
  <title>Errors history table</title>

    
</head>


<body>

<?php
    session_start();
    include("./bd.php");
    $query = "SELECT * FROM ".$_SESSION['table']." WHERE number BETWEEN'".$_SESSION['number_low']."' AND '".$_SESSION['number_high']."'\n";
        $result=mysql_query($query) or die("Query failed date/time start:".mysql_error());
	$data_map=array(
	    '_RSErrJobM'=>array(
			'АКБ полностью разряжен, напряжение критически низкое для работы МАП.',
			'Превышение напряжения на АКБ, генерация или заряд временно приостановлен.',
			 'Ток КЗ по АКБ при заряде, заряд временно приостановлен.',
			 'Ток КЗ по АКБ, генерация или заряд временно приостановлен.',
			 'Возможно залипло основное реле, необходим ремонт.',
			 'Ток КЗ по сети 220В, произойдет переход на генерацию с возможным дальнейшим отключением по КЗ АКБ.',
			 'На выходе 220В (но не на входе сети 220В) постороннее напряжение, генерация будет отключена.',
			 'Произошел сброс программы, возможно сильная помеха от грозы и т.д.'
			    ),
	    '_RSErrJob'=>array(
			'АКБ полностью разряжен, МАП будет работать еще 1 минуту и отключит генерацию, пока напряжение на АКБ не станет выше EE_LCD_UAccMinNetGen =12,5в (заводское) или не перейдет на заряд.',
			'Перегрузка по АКБ, генерация продолжится в течении 10сек (отсчет времени в ячейке _T_Overload). После чего произойдет отключение на 10сек. (_TOff_Overload) и так не более 10 раз в течении 10мин.',
			'Нагрузка выше номинальной мощности – будем работать ограниченное время (30 мин для Pro модели). Отсчет времени работы в ячейке _T_Nominal.',
			'Превышение температуры, приостановка генерации или заряда.',
			'Вентилятор не крутится, отрабатывает аналогично перегрузке ErrJ_PowAccMax.',
			'Мощность перегрузки по сети, переход на генерацию.',
			'Был сбой в режиме работы (например по сбросу питания или сильной помехи).',
			'Выключились по многократным КЗ по заряду, через 2ч снимаем ошибку.'
			    ),
	    '_RSWarning'=>array(
			'Нет действия для комбинации кнопка (“СТАРТ” и “ЗАРЯД”), можно игнорировать.',
			'Сетевое напряжение вышло за пределы.',
			'Есть постороннее напряжение на выходной розетке или большие выбросы напряжения от нагрузки.',
			'Выбросы напряжения в сети 220В по входу.',
			'Залипла кнопка (“СТАРТ” или “ЗАРЯД”).',
			'Переход на заряд не возможен - нет сети на входе.',
			'В режиме трансляции сети и возможно заряда, мощность нагрузки за пределами выставленной максимальной мощности (EE_LCD_NetMaxPow), но меньше мощности МАР. Произойдет переход на генерацию (кроме режима подкачки).',
			'Сеть нестабильна (по напряжению или частоте), не будет перехода на трансляцию сети или выход из заряда если насчитали много нестабильностей.'
			    ),
	    '_I2C_Err'=>array(
			'I2C Err Ack',
			'I2C Err Sum',
			'I2C Err Data Size',
			'I2C Err Protocol',
			'н/о',
			'н/о',
			'н/о',
			'н/о'
			),
	    '_RSErrDop'=>array(
			'Неправильные данные от предыдущей фазы или нет связи вообще.',
			'Вышли за окно синхронизации сдвига между фазами в 60 град.',
			'н/о',
			'н/о',
			'н/о',
			'н/о',
			'н/о',
			'н/о'
			    )
	);

	    $data_mppt=array(
	     'RSErrSis'=>array(
			'Перенапряжение панелей',
			'Перенапряжение АКБ',
			'Перезаряд АКБ',
			'Короткое замыкание АКБ',
			'Перегрев АКБ',
			'Ошибка связи I2C',
			'н/о',
			'н/о'
			    )

	);

	   $legend=array('map_errors'=>'МАП', 'mppt_errors'=>'MPPT');

	while ($row=mysql_fetch_assoc($result))
	    {
	    








	    }


    mysql_free_result($result);
    mysql_close($db);
?>

</body>
</html>