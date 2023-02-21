<?xml version="1.0" encoding="utf-8"?> 
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" >
<xsl:output method="xml" version="1.0" omit-xml-declaration="yes" indent="yes" media-type="text/html"/>
    
<xsl:template match="/">
	<xsl:apply-templates select="//article[position() &lt;= 6]" />
</xsl:template>

<xsl:template match="article">
		<xsl:element name="h3"><xsl:value-of select="headline" /></xsl:element>
		</div>
		<xsl:element name="p">
			<xsl:value-of select="story" />
			<xsl:element name="br" />
			<xsl:element name="a">
				<xsl:attribute name="href"><xsl:value-of select="link" /></xsl:attribute>
				<xsl:attribute name="target"><xsl:text>_blank</xsl:text></xsl:attribute>
				<xsl:text>Click Here</xsl:text>
			</xsl:element>
			<xsl:element name="br" />
			
		</xsl:element>
   
</xsl:template>

</xsl:stylesheet>