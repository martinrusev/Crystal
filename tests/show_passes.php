<?php
class ShowPasses extends HtmlReporter 
{
    
    function ShowPasses() 
	{
        $this->HtmlReporter();
    }
    
    function paintPass($message) 
	{
        parent::paintPass($message);
        print "<p style='font-size:16px'>";
        print "<br/>";
        print "<span class=\"pass\">Pass</span>: ";
        $breadcrumb = $this->getTestList();
        array_shift($breadcrumb);
        print "<span style='font-size:16px; color:#777;'>" . implode("-&gt;", $breadcrumb) . "</span> <br/>";
        print $message . "<br />\n\n";
        print "</p>";
    }
    
    
    
	function paintFail($message) 
	{
        parent::paintFail($message);
        print "<p style='font-size:16px'>";
        print "<br/>";
        print "<span class=\"fail\" style='background-color:red; color:white;'>Fail</span>: ";
        $breadcrumb = $this->getTestList();
        array_shift($breadcrumb);
        print "<span style='font-size:16px; color:#777;'>" . implode("-&gt;", $breadcrumb) . "</span> <br/>";
        print $message . "<br />\n\n";
        print "</p>";
    }
    
    
}
?>