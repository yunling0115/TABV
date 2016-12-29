<?xml version="1.0" encoding="ISO-8859-1"?>
<!-- Edited by XMLSpy® -->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<!-- Reference: http://msdn.microsoft.com/en-us/library/ms256045.aspx -->

<xsl:template match="/">
  <html>
	  <body>
	  <h2>SEC Forms</h2>  
		  <table border="1">
		  <tr bgcolor="#9acd32">
			<th>Name</th>
			<th>Type</th>
			<th>Price</th>
			<th>Description</th>
			<th>Sales Price</th>
			<th>Begin Date</th>
			<th>End Date</th>
		  </tr>
			<xsl:apply-templates select="products/product">  
			</xsl:apply-templates>  
		  </table>
	  </body>
  </html>
</xsl:template>

<!-- Normal Information -->

<xsl:template match="product">
  <tr>
    <xsl:apply-templates select="name"/>  
    <xsl:apply-templates select="type"/>
    <xsl:apply-templates select="price"/>  
    <xsl:apply-templates select="desc"/>
	<xsl:apply-templates select="salesprice"/>
	<xsl:apply-templates select="salesstart"/>
	<xsl:apply-templates select="salesend"/>
  </tr>
</xsl:template>

<xsl:template match="name">
  <td>
  <xsl:value-of select="."/>
  </td>
</xsl:template>

<xsl:template match="type">
  <td>
  <xsl:value-of select="."/>
  </td>
</xsl:template>

<xsl:template match="price">
  <td>
  <xsl:value-of select="."/>
  </td>
</xsl:template>

<xsl:template match="desc">
  <td>
  <xsl:value-of select="."/>
  </td>
</xsl:template>

<!-- sales -->
<xsl:template match="salesprice">
  <td>
  <xsl:value-of select="."/>
  </td>
</xsl:template>

<xsl:template match="salesstart">
  <td>
  <xsl:value-of select="."/>
  </td>
</xsl:template>

<xsl:template match="salesend">
  <td>
  <xsl:value-of select="."/>
  </td>
</xsl:template>


</xsl:stylesheet>
