<?php

//自定函式：print_food_effect，用於將食物效果資料輸出
    function print_food_effect($data){
//將陣列各元素值依序指定到變數，為方便理解變數名與索引名相同
        foreach($data as $var){
            $Name = $var['Name']; //名前
            $Time = $var['Time']; //有効時間（秒）
            $Class = $var['Class']; //類型
            $Note = $var['Note']; //註記
            $Regene = $var['Regene']; //リジェネ+
            $Refresh = $var['Refresh']; //リフレシュ
            $Regain = $var['Regain']; //リゲイン
            $HPtotal = $var['HPtotal']; // (HP総回復量：)
            $MPtotal = $var['MPtotal']; // (MP総回復量：)
            $TPtotal = $var['TPtotal']; // (TP総回復量：)
            $HP = $var['HP']; //HP+
            $HPpercent = $var['HPpercent']; //HP+%
            $HPmax = $var['HPmax']; //HP+最大
            $MP = $var['MP']; //MP+
            $MPpercent = $var['MPpercent']; //HP+%
            $MPmax = $var['MPmax']; //MP+最大
            $STR = $var['STR']; //STR
            $DEX = $var['DEX']; //DEX
            $VIT = $var['VIT']; //VIT
            $AGI = $var['AGI']; //AGI
            $INT = $var['INT']; //INT
            $MND = $var['MND']; //MND
            $CHR = $var['CHR']; //CHR
            $ResistFire = $var['ResistFire']; //耐火
            $ResistIce = $var['ResistIce']; //耐氷
            $ResistWind = $var['ResistWind']; //耐風
            $ResistEarth = $var['ResistEarth']; //耐土
            $ResistLightning = $var['ResistLightning']; //耐雷
            $ResistWater = $var['ResistWater']; //耐水
            $ResistLight = $var['ResistLight']; //耐光
            $ResistDark = $var['ResistDark']; //耐闇
            $Accuracy = $var['Accuracy']; //命中+
            $AccuracyPercent = $var['AccuracyPercent']; //命中+%
            $AccuracyMax = $var['AccuracyMax']; //(命中+最大)
            $RangedAccuracy = $var['RangedAccuracy']; //飛命
            $Attack = $var['Attack']; //攻撃+
            $AttackPercent = $var['AttackPercent']; //攻撃+%
            $AttackMax = $var['AttackMax']; //(攻撃+最大)
            $RangedAccuracyPercent = $var['RangedAccuracyPercent']; //飛命+%
            $RangedAccuracyMax = $var['RangedAccuracyMax']; //(飛命+最大)
            $RangedAttack = $var['RangedAttack']; //飛攻
            $RangedAttackPercent = $var['RangedAttackPercent']; //飛攻+%
            $RangedAttackMax = $var['RangedAttackMax']; //(飛攻+最大)
            $MagicAccuracy = $var['MagicAccuracy']; //魔命
            $MagicAccuracyPercent = $var['MagicAccuracyPercent']; //魔命+%
            $MagicAccuracyMax = $var['MagicAccuracyMax']; //(魔命+最大)
            $MagicAttack = $var['MagicAttack']; //魔攻
            $MagicAttackPercent = $var['MagicAttackPercent']; //魔攻+%
            $MagicAttackMax = $var['MagicAttackMax']; //(魔攻+最大)
            $Evasion = $var['Evasion']; //回避
            $EvasionPercent = $var['EvasionPercent']; //回避+%
            $EvasionMax= $var['EvasionMax']; //(回避+最大)
            $Defense = $var['Defense']; //防御
            $DefensePercent = $var['DefensePercent']; //防御+%
            $DefenseMax = $var['DefenseMax']; //(防御+最大)
            $MagicEvasion = $var['MagicEvasion']; //魔回避
            $MagicEvasionPercent = $var['MagicEvasionPercent']; //魔回避+%
            $MagicEvasionMax = $var['MagicEvasionMax']; //(魔回避+最大)
            $MagicDefense = $var['MagicDefense']; //魔防
            $MagicDefensePercent = $var['MagicDefensePercent']; //魔防+%
            $MagicDefenseMax = $var['MagicDefenseMax']; //(魔防+最大)
            $Enmity = $var['Enmity']; //敵対心
            $DA = $var['DA']; //ダブルアタック
            $TA = $var['TA']; //トリプルアタック
            $STP = $var['STP']; //ストアTP
            $SubtleBlow = $var['SubtleBlow']; //モクシャ
            $MB2 = $var['MB2']; //マジックバーストダメージII
            $FCpercent = $var['FCpercent']; //ファストキャスト
            $Counter = $var['Counter']; //カウンター
            $Plantoid = $var['Plantoid']; //プラントイドキラー
            $Beast = $var['Beast']; //ビーストキラー
            $Arcana = $var['Arcana']; //アルカナキラー
            $Aqan = $var['Aquan']; //アクアンキラー
            $Demon = $var['Demon']; //デーモンキラー
            $Undead = $var['Undead']; //アンデッドキラー
            $Lizard = $var['Lizard']; //リザードキラー
            $Vermin = $var['Vermin']; //ヴァーミンキラー
            $Dragon = $var['Dragon']; //ドラゴンキラー
            $Amorph = $var['Amorph']; //アモルフキラー
            $Bird = $var['Bird']; //バードキラー
            $Slow = $var['Slow']; //レジストスロウ
            $Sleep = $var['Sleep']; //レジストスリープ
            $Silence = $var['Silence']; //レジストサイレス
            $Stun = $var['Stun']; //レジストスタン
            $Virus = $var['Virus']; //レジストウィルス
            $Poison = $var['Poison']; //レジストポイズン
            $Blind = $var['Blind']; //レジストブライン
            $Paralyze = $var['Paralyze']; //レジストパライズ
            $Petrify = $var['Petrify']; //レジストペトリ
            $Curse = $var['Curse']; //レジストカーズ
            $Amnesia = $var['Amnesia']; //レジストアムネジア
            $HHP = $var['HHP']; //ヒーリングHP
            $HMP = $var['HMP']; //ヒーリングMP
            $SynthesisSuccessRate = $var['SynthesisSuccessRate']; //合成成功率
            $SyntheticSkillIncreaseRate = $var['SyntheticSkillIncreaseRate']; //合成スキル上昇率
            $SyntheticMaterialLossRate = $var['SyntheticMaterialLossRate']; //合成素材消失率
            $HQSuccessRate = $var['HQSuccessRate']; //ハイクォリティー成功率
            $BattleSkillIncreaseRate = $var['BattleSkillIncreaseRate']; //戦闘スキル上昇率
            $MagicSkillIncreaseRate = $var['MagicSkillIncreaseRate']; //魔法スキル上昇率
            $FishingSkillIncreaseRate = $var['FishingSkillIncreaseRate']; //釣りスキル上昇率
//整理食物效果說明：如無該效果則不顯示
            $msg = '';
            if($HP != ''){if($HP < 0){$msg .= "HP".$HP."&nbsp;";}else{$msg .= "HP"."+".$HP."&nbsp;";}}else{unset($HP);}
            if($HPpercent != '' && $HPmax != ''){$msg .= "HP"."+".$HPpercent."%(最大".$HPmax.")&nbsp;";}else{unset($HPpercent,$HPmax);}
            if($MP != ''){if($MP < 0){$msg .= "MP".$MP."&nbsp;";}else{$msg .= "MP"."+".$MP."&nbsp;";}}else{unset($MP);}
            if($MPpercent != '' && $MPmax != ''){$msg .= "MP"."+".$MPpercent."%(最大".$MPmax.")&nbsp;";}else{unset($MPpercent,$MPmax);}
            if($STR != ''){if($STR < 0){$msg .= "STR".$STR."&nbsp;";}else{$msg .= "STR"."+".$STR."&nbsp;";}}else{unset($STR);}
            if($DEX != ''){if($DEX < 0){$msg .= "DEX".$DEX."&nbsp;";}else{$msg .= "DEX"."+".$DEX."&nbsp;";}}else{unset($DEX);}
            if($VIT != ''){if($VIT < 0){$msg .= "VIT".$VIT."&nbsp;";}else{$msg .= "VIT"."+".$VIT."&nbsp;";}}else{unset($VIT);}
            if($AGI != ''){if($AGI < 0){$msg .= "AGI".$AGI."&nbsp;";}else{$msg .= "AGI"."+".$AGI."&nbsp;";}}else{unset($AGI);}
            if($INT != ''){if($INT < 0){$msg .= "INT".$INT."&nbsp;";}else{$msg .= "INT"."+".$INT."&nbsp;";}}else{unset($INT);}
            if($MND != ''){if($MND < 0){$msg .= "MND".$MND."&nbsp;";}else{$msg .= "MND"."+".$MND."&nbsp;";}}else{unset($MND);}
            if($ResistFire != ''){$msg .= "耐火+".$ResistFire."&nbsp;";}else{unset($ResistFire);}
            if($ResistIce != ''){$msg .= "耐氷+".$ResistIce."&nbsp;";}else{unset($ResistIce);}
            if($ResistWind != ''){$msg .= "耐風+".$ResistWind."&nbsp;";}else{unset($ResistWind);}
            if($ResistEarth != ''){$msg .= "耐土+".$ResistEarth."&nbsp;";}else{unset($ResistEarth);}
            if($ResistLightning != ''){$msg .= "耐雷".$ResistLightning."&nbsp;";}else{unset($ResistLightning);}
            if($ResistWater != ''){$msg .= "耐水+".$ResistWater."&nbsp;";}else{unset($ResistWater);}
            if($ResistLight != ''){$msg .= "耐光+".$ResistLight."&nbsp;";}else{unset($ResistLight);}
            if($ResistDark != ''){$msg .= "耐闇+".$ResistDark."&nbsp;";}else{unset($ResistDark);}
            if($Accuracy != ''){$msg .= "命中"."+".$Accuracy."&nbsp;";}else{unset($Accuracy);}
            if($AccuracyPercent != '' && $AccuracyMax != ''){$msg .= "命中"."+".$AccuracyPercent."%(最大".$AccuracyMax.")&nbsp;";}else{unset($AccuracyPercent,$AccuracyMax);}
            if($Attack != ''){$msg .= "攻撃"."+".$Attack."&nbsp;";}else{unset($Attack);}
            if($AttackPercent != '' && $AttackMax != ''){$msg .= "攻撃"."+".$AttackPercent."%(最大".$AttackMax.")&nbsp;";}else{unset($AttackPercent,$AttackMax);}
            if($RangedAccuracy != ''){$msg .= "飛命"."+".$RangedAccuracy."&nbsp;";}else{unset($RangedAccuracy);}
            if($RangedAccuracyPercent != '' && $RangedAccuracyMax != ''){$msg .= "飛命"."+".$RangedAccuracyPercent."%(最大".$RangedAccuracyMax.")&nbsp;";}else{unset($RangedAccuracyPercent,$RangedAccuracyMax);}
            if($RangedAttack != ''){$msg .= "飛攻"."+".$RangedAttack."&nbsp;";}else{unset($RangedAttack);}
            if($RangedAttackPercent != '' && $RangedAttackMax != ''){$msg .= "飛攻"."+".$RangedAttackPercent."%(最大".$RangedAttackMax.")&nbsp;";}else{unset($RangedAttackPercent,$RangedAttackMax);}
            if($MagicAccuracy != ''){$msg .= "魔命"."+".$MagicAccuracy."&nbsp;";}else{unset($MagicAccuracy);}
            if($MagicAccuracyPercent != '' && $MagicAccuracyMax != ''){$msg .= "魔命"."+".$MagicAccuracyPercent."%(最大".$MagicAccuracyMax.")&nbsp;";}else{unset($MagicAccuracyPercent,$MagicAccuracyMax);}
            if($MagicAttack != ''){$msg .= "魔攻"."+".$MagicAttack."&nbsp;";}else{unset($MagicAttack);}
            if($MagicAttackPercent != '' && $MagicAttackMax != ''){$msg .= "魔攻"."+".$MagicAttackPercent."%(最大".$MagicAttackMax.")&nbsp;";}else{unset($MagicAttackPercent,$MagicAttackMax);}
            if($Evasion != ''){if($Evasion < 0){$msg .= "回避".$Evasion."&nbsp;";}else{$msg .= "回避"."+".$Evasion."&nbsp;";}}else{unset($Evasion);}
            if($EvasionPercent != '' && $EvasionMax != ''){$msg .= "回避"."+".$EvasionPercent."%(最大".$EvasionMax.")&nbsp;";}else{unset($EvasionPercent,$EvasionMax);}
            if($Defense != ''){if($Defense < 0){$msg .= "防御".$Defense."&nbsp;";}else{$msg .= "防御"."+".$Defense."&nbsp;";}}else{unset($Defense);}
            if($DefensePercent != '' && $DefenseMax != ''){$msg .= "防御"."+".$DefensePercent."%(最大".$DefenseMax.")&nbsp;";}else{unset($DefensePercent,$DefenseMax);}
            if($MagicEvasion != ''){$msg .= "魔回避"."+".$MagicEvasion."&nbsp;";}else{unset($MagicEvasion);}
            if($MagicEvasionPercent != '' && $MagicEvasionMax != ''){$msg .= "魔回避"."+".$MagicEvasionPercent."%(最大".$MagicEvasionMax.")&nbsp;";}else{unset($MagicEvasionPercent,$MagicEvasionMax);}
            if($MagicDefense != ''){$msg .= "魔防"."+".$MagicDefense."&nbsp;";}else{unset($MagicDefense);}
            if($MagicDefensePercent != '' && $MagicDefenseMax != ''){$msg .= "魔防"."+".$MagicDefensePercent."%(最大".$MagicDefenseMax.")&nbsp;";}else{unset($MagicDefensePercent,$MagicDefenseMax);}
            if($Regene != ''){if($Regene < 0){$msg .= "リジェネ".$Regene.")&nbsp;";}else{$msg .= "リジェネ"."+".$Regene."&nbsp;";}}else{unset($Regene);}
            if($HPtotal != ''){$msg .= "(HP総回復量：".$HPtotal.")&nbsp;";}else{unset($HPtotal);}
            if($Refresh != ''){{$msg .= "リフレシュ"."+".$Refresh."&nbsp;";}}else{unset($Refresh);}
            if($MPtotal != ''){$msg .= "(MP総回復量：".$MPtotal.")&nbsp;";}else{unset($MPtotal);}
            if($Regain != ''){{$msg .= "リゲイン"."+".$Regain."&nbsp;";}}else{unset($Regain);}
            if($TPtotal != ''){$msg .= "(TP総回復量：".$TPtotal.")&nbsp;";}else{unset($TPtotal);}
            if($Enmity != ''){if($Enmity < 0){$msg .= "敵対心".$Enmity.")&nbsp;";}else{$msg .= "敵対心"."+".$Enmity."&nbsp;";}}else{unset($Enmity);}
            if($DA != ''){$msg .= "ダブルアタック+".$DA."%&nbsp;";}else{unset($DA);}
            if($TA != ''){$msg .= "トリプルアタック+".$TA."%&nbsp;";}else{unset($TA);}
            if($STP != ''){$msg .= "ストアTP+".$STP."&nbsp;";}else{unset($STP);}
            if($SubtleBlow != ''){$msg .= "モクシャ+".$SubtleBlow."&nbsp;";}else{unset($SubtleBlow);}
            if($MB2 != ''){$msg .= "マジックバーストダメージII+".$MB2."&nbsp;";}else{unset($MB2);}
            if($FCpercent != ''){$msg .= "ファストキャスト+".$FCpercent."%&nbsp;";}else{unset($FCpercent);}
            if($Counter != ''){$msg .= "カウンター+".$Counter."%&nbsp;";}else{unset($Counter);}
            if($Plantoid != ''){$msg .= "プラントイドキラー+".$Plantoid."&nbsp;";}else{unset($Plantoid);}
            if($Beast != ''){$msg .= "ビーストキラー+".$Beast."&nbsp;";}else{unset($Beast);}
            if($Arcana != ''){$msg .= "アルカナキラー+".$Arcana."&nbsp;";}else{unset($Arcana);}
            if($Aqan != ''){$msg .= "アクアンキラー+".$Aqan."&nbsp;";}else{unset($Aqan);}
            if($Demon != ''){$msg .= "デーモンキラー+".$Demon."&nbsp;";}else{unset($Demon);}
            if($Undead != ''){$msg .= "アンデッドキラー+".$Undead."&nbsp;";}else{unset($Undead);}
            if($Lizard != ''){$msg .= "リザードキラー+".$Lizard."&nbsp;";}else{unset($Lizard);}
            if($Vermin != ''){$msg .= "ヴァーミンキラー+".$Vermin."&nbsp;";}else{unset($Vermin);}
            if($Dragon != ''){$msg .= "ドラゴンキラー+".$Dragon."&nbsp;";}else{unset($Dragon);}
            if($Amorph != ''){$msg .= "アモルフキラー+".$Amorph."&nbsp;";}else{unset($Amorph);}
            if($Bird != ''){$msg .= "バードキラー+".$Bird."&nbsp;";}else{unset($Bird);}
            if($Slow != ''){$msg .= "レジストスロウ+".$Slow."&nbsp;";}else{unset($Slow);}
            if($Sleep != ''){if($Sleep < 0){$msg .= "レジストスリープ".$Sleep.")&nbsp;";}else{$msg .= "レジストスリープ"."+".$Sleep."&nbsp;";}}else{unset($Sleep);}
            if($Silence != ''){$msg .= "レジストサイレス+".$Silence."&nbsp;";}else{unset($Silence);}
            if($Stun != ''){$msg .= "レジストスタン+".$Stun."&nbsp;";}else{unset($Stun);}
            if($Virus != ''){$msg .= "レジストウィルス+".$Virus."&nbsp;";}else{unset($Virus);}
            if($Poison != ''){$msg .= "レジストポイズン+".$Poison."&nbsp;";}else{unset($Poison);}
            if($Blind != ''){$msg .= "レジストブライン+".$Blind."&nbsp;";}else{unset($Blind);}
            if($Paralyze != ''){$msg .= "レジストパライズ+".$Paralyze."&nbsp;";}else{unset($Paralyze);}
            if($Petrify != ''){$msg .= "レジストペトリ+".$Petrify."&nbsp;";}else{unset($Petrify);}
            if($Curse != ''){$msg .= "レジストカーズ+".$Curse."&nbsp;";}else{unset($Curse);}
            if($Amnesia != ''){$msg .= "レジストアムネジア+".$Amnesia."&nbsp;";}else{unset($Amnesia);}
            if($HHP != ''){$msg .= "ヒーリングHP+".$HHP."&nbsp;";}else{unset($HHP);}
            if($HMP != ''){$msg .= "ヒーリングMP+".$HMP."&nbsp;";}else{unset($HMP);}
            if($SynthesisSuccessRate != ''){$msg .= "合成成功率+".$SynthesisSuccessRate."%&nbsp;";}else{unset($SynthesisSuccessRate);}
            if($SyntheticSkillIncreaseRate != ''){$msg .= "合成スキル上昇率+".$SyntheticSkillIncreaseRate."%&nbsp;";}else{unset($SyntheticSkillIncreaseRate);}
            if($SyntheticMaterialLossRate != ''){$msg .= "合成素材消失率".$SyntheticMaterialLossRate."%&nbsp;";}else{unset($SyntheticMaterialLossRate);}
            if($HQSuccessRate != ''){$msg .= "ハイクォリティー成功率+".$HQSuccessRate."&nbsp;";}else{unset($HQSuccessRate);}
            if($BattleSkillIncreaseRate != ''){$msg .= "戦闘スキル上昇率x".$BattleSkillIncreaseRate."%&nbsp;";}else{unset($BattleSkillIncreaseRate);}
            if($MagicSkillIncreaseRate != ''){$msg .= "魔法スキル上昇率x".$MagicSkillIncreaseRate."%&nbsp;";}else{unset($MagicSkillIncreaseRate);}
            if($FishingSkillIncreaseRate != ''){$msg .= "釣りスキル上昇率+".$FishingSkillIncreaseRate."&nbsp;";}else{unset($FishingSkillIncreaseRate);}
            if($Time != ''){$msg .= $Time."&nbsp;";}else{unset($Time);}

//開始顯示食物效果資料
        echo "<tr valign=\"middle\">";
        echo "<td width=\"170\">$Name</td>";
        echo "<td>";
//依照陣列元素有無決定是否顯示
        echo "【" . $Class . "】";
        if($Note != ''){echo $Note;}else{unset($Note);} 
        echo "<br />";
        echo $msg;
        echo "</td>";
        echo "</tr>\n";
        }
    }
?>