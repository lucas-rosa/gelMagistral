<?php
LibFactory::getInstance(null,null,'mpdf/class.mpdf.php');

class mpdfHelper extends mPDF
{
	function setMPDF($mode = '',$format = 'A4',$default_font_size = 0,$default_font = '',$mgl = 15,$mgr = 15,$mgt = 46,$mgb = 16,$mgh = 9,$mgf = 9,$orientation = 'P')
	{
		$this->mPDF($mode,$format,$default_font_size,$default_font,$mgl,$mgr,$mgt,$mgb,$mgh,$mgf,$orientation);
	}
	
	function setWriteHTML($html,$sub=0,$init=true,$close=true)
	{
		$this->WriteHTML($html,$sub,$init,$close);
	}
	
	function setAddPages($orientation='',$condition='', $resetpagenum='', $pagenumstyle='', $suppress='',$mgl='',$mgr='',$mgt='',$mgb='',$mgh='',$mgf='',$ohname='',$ehname='',$ofname='',$efname='',$ohvalue=0,$ehvalue=0,$ofvalue=0,$efvalue=0,$pagesel='',$newformat='')
	{
		$this->AddPage($orientation, $condition, $resetpagenum, $pagenumstyle, $suppress, $mgl, $mgr, $mgt, $mgb, $mgh, $mgf, $ohname, $ehname, $ofname, $efname, $ohvalue, $ehvalue, $ofvalue, $efvalue, $pagesel, $newformat);
	}
	
	function setOutput($name='',$dest='')
	{
		$this->Output($name,$dest);
	}
	
	function setSetColumns($NbCol,$vAlign='',$gap=5)
	{
		$this->SetColumns($NbCol,$vAlign='',$gap);
	}
	
	function setSetDisplayMode($zoom,$layout='continuous')
	{
		$this->SetDisplayMode($zoom,$layout);
	}
	
	function setSetHTMLHeader($header='',$OE='',$write=false)
	{
		$this->SetHTMLHeader($header,$OE,$write);
	}
	
	function setSetHeader($Harray,$side,$write)
	{
		$this->SetHeader($Harray,$side,$write);
	}
	
	function setSetFooter($Farray=array(),$side='')
	{
		$this->SetFooter($Farray,$side);
	}
	
	function setTOCpagebreakByArray($a)
	{
		$this->TOCpagebreakByArray($a);
	}
	
	function setSetHTMLFooter($footer='',$OE='')
	{
		$this->setHTMLFooter($footer,$OE);
	}
	
	function setAddPage($orientation='',$condition='', $resetpagenum='', $pagenumstyle='', $suppress='',$mgl='',$mgr='',$mgt='',$mgb='',$mgh='',$mgf='',$ohname='',$ehname='',$ofname='',$efname='',$ohvalue=0,$ehvalue=0,$ofvalue=0,$efvalue=0,$pagesel='',$newformat='')
	{
		$this->AddPage($orientation,$condition, $resetpagenum, $pagenumstyle, $suppress,$mgl,$mgr,$mgt,$mgb,$mgh,$mgf,$ohname,$ehname,$ofname,$efname,$ohvalue,$ehvalue,$ofvalue,$efvalue,$pagesel,$newformat);
	}
	
	function setCreateIndex($NbCol=1, $reffontsize='', $linespacing='', $offset=3, $usedivletters=1, $divlettfontsize='', $gap=5, $reffont='',$divlettfont='', $useLinking=false)
	{
		$this->CreateIndex($NbCol, $reffontsize, $linespacing, $offset, $usedivletters, $divlettfontsize, $gap, $reffont,$divlettfont, $useLinking);
	}
	
	function setSetDefaultBodyCSS($prop, $val)
	{
		$this->SetDefaultBodyCSS($prop, $val);
	}
	
	function setSetDirectionality($dir='ltr')
	{
		$this->SetDirectionality($dir);
	}
	
	function setSetTitle($title)
	{
		$this->SetTitle($title);
	}
	
	function setSetAuthor($author)
	{
		$this->SetAuthor($author);
	}
	
	function setSetAutoFont($af = AUTOFONT_ALL)
	{
		$this->SetAutoFont($af);
	}
	
	function setSetWatermarkText($txt='', $alpha=-1)
	{
		$this->SetWatermarkText($txt, $alpha);
	}
	
	function setSetWatermarkImage($src, $alpha=-1, $size='D', $pos='F')
	{
		$this->SetWatermarkImage($src, $alpha, $size, $pos);
	}
	
	function setSetImportUse()
	{
		$this->SetImportUse();
	}
	
	function setThumbnail($file, $npr=3, $spacing=10)
	{
		$this->Thumbnail($file, $npr, $spacing);
	}
	
	function setSetCompression($compress)
	{
		$this->SetCompression($compress);
	}
	
	function setImportPage($pageno=1, $crop_x=null, $crop_y=null, $crop_w=0, $crop_h=0, $boxName='/CropBox')
	{
		$this->ImportPage($pageno, $crop_x, $crop_y, $crop_w, $crop_h, $boxName);
	}
	
	function setUseTemplate($tplidx, $_x=null, $_y=null, $_w=0, $_h=0)
	{
		$this->UseTemplate($tplidx, $_x, $_y, $_w, $_h);
	}
	
	function setRect($x,$y,$w,$h,$style='')
	{
		$this->Rect($x,$y,$w,$h,$style);
	}
	
	function setSetDocTemplate($file='', $continue=0)
	{
		$this->SetDocTemplate($file, $continue);
	}
	
	function setImage($file,$x,$y,$w=0,$h=0,$type='',$link='',$paint=true, $constrain=true, $watermark=false, $shownoimg=true, $allowvector=true)
	{
		$this->Image($file, $x, $y, $w, $h, $type, $link, $paint, $constrain, $watermark, $shownoimg, $allowvector);
	}
	
	function setShaded_box($text,$font='',$fontstyle='B',$szfont='',$width='70%',$style='DF',$radius=2.5,$fill='#FFFFFF',$color='#000000',$pad=2)
	{
		$this->Shaded_box($text, $font, $fontstyle, $szfont, $width, $style, $radius, $fill, $color, $pad);
	}
	
	function setSetAlpha($alpha, $bm='Normal', $return=false, $mode='B')
	{
		$this->SetAlpha($alpha, $bm, $return, $mode);
	}
	
	function setWriteBarcode($code, $showtext=1, $x='', $y='', $size=1, $border=0, $paddingL=1, $paddingR=1, $paddingT=2, $paddingB=2, $height=1, $bgcol=false, $col=false, $btype='ISBN', $supplement='0', $supplement_code='', $k=1)
	{
		$this->WriteBarcode($code, $showtext, $x, $y, $size, $border, $paddingL, $paddingR, $paddingT, $paddingB, $height, $bgcol, $col, $btype, $supplement, $supplement_code, $k);
	}
	
	function setSetSourceFile($filename)
	{
		$this->SetSourceFile($filename);
	}
	
	function setCell($w,$h=0,$txt='',$border=0,$ln=0,$align='',$fill=0,$link='', $currentx=0, $lcpaddingL=0, $lcpaddingR=0, $valign='M', $spanfill=0, $abovefont=0, $belowfont=0, $exactWidth=false)
	{
		$this->Cell($w, $h, $txt, $border, $ln, $align, $fill, $link, $currentx, $lcpaddingL, $lcpaddingR, $valign, $spanfill, $abovefont, $belowfont, $exactWidth);
	}
	
	function setSetFont($family,$style='',$size=0, $write=true, $forcewrite=false)
	{
		$this->SetFont($family, $style, $size, $write, $forcewrite);
	}
	
	function setSetDrawColor($r,$g=-1,$b=-1,$col4=-1, $return=false)
	{
		$this->SetDrawColor($r, $g, $b, $col4, $return);
	}
	
	function setSetFillColor($r,$g=-1,$b=-1,$col4=-1, $return=false)
	{
		$this->SetFillColor($r, $g, $b, $col4, $return);
	}
	
	function setSetTextColor($r,$g=-1,$b=-1,$col4=-1, $return=false)
	{
		$this->SetTextColor($r, $g, $b, $col4, $return);
	}
	
	function setStartTransform($returnstring=false)
	{
		$this->StartTransform($returnstring);
	}

	function setTransformScale($s_x, $s_y, $x='', $y='', $returnstring)
	{
		$this->transformScale($s_x, $s_y, $x, $y, $returnstring);
	}
	
	function setStopTransform($returnstring=false)
	{
		$this->StopTransform($returnstring);
	}
	
	function setStartProgressBarOutput($mode=1)
	{
		$this->StartProgressBarOutput($mode);
	}
	
	function setAddSpotColor($name, $c, $m, $y, $k)
	{
		$this->AddSpotColor($name, $c, $m, $y, $k);
	}
	
	function setSetJS($script)
	{
		$this->SetJS($script);
	}
}