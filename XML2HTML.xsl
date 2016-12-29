<?xml version="1.0" encoding="ISO-8859-1"?>
<!-- Edited by XMLSpy® -->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body>
  <h2>Easy Filing SEC Form</h2>
    <table border="1">
      <tr bgcolor="#9acd32">
        <th>Name</th>
        <th>Type</th>
		<th>Price</th>
		<th>Description</th>
      </tr>
      <xsl:for-each select="products/product">
      <tr>
        <td><xsl:value-of select="name"/></td>
        <td><xsl:value-of select="type"/></td>
        <td><xsl:value-of select="price"/></td>
        <td><xsl:value-of select="desc"/></td>
      </tr>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>