<?xml version="1.0" encoding="utf-8"?> 
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" >
<xsl:output method="xml" version="1.0" omit-xml-declaration="yes" indent="yes" media-type="text/html"/>
    
<xsl:template match="/">
	<xsl:apply-templates select="//item[position() &lt;= 6]" />
</xsl:template>

<xsl:template match="item">
	<div class="col-lg-4 col-md-4 col-sm-4">
	<div class="card">
	<div class="card-header">
		<xsl:element name="h3"><xsl:value-of select="title" /></xsl:element>
		</div>
		<div class="card-block">
		<xsl:element name="p">
			<xsl:value-of select="description" />
			<xsl:element name="br" />
			<xsl:element name="a">
				<xsl:attribute name="href"><xsl:value-of select="link" /></xsl:attribute>
				<xsl:attribute name="target"><xsl:text>_blank</xsl:text></xsl:attribute>
				<xsl:text>Click Here</xsl:text>
			</xsl:element>
			<xsl:element name="br" />
			<span class="bold"><xsl:value-of select="pubDate" /></span>	
		</xsl:element>
		</div>
		<div class="card-footer">Data &#169;bbc.co.uk</div>
	</div>
	<br/>
	</div>
	
</xsl:template>

</xsl:stylesheet>
