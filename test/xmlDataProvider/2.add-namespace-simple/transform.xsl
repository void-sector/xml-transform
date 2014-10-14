<xsl:stylesheet
    version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:s="http://schemas.xmlsoap.org/soap/envelope/"
    omit-xml-declaration="yes">

    <xsl:template match="s:root">
        <s:root xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
            <books>
                <xsl:apply-templates select="books/book" />
            </books>
        </s:root>
    </xsl:template>


    <xsl:template match="book">
        <book foo="bar">
            <title>
                <xsl:value-of select="title" />
            </title>
        </book>
    </xsl:template>

</xsl:stylesheet>