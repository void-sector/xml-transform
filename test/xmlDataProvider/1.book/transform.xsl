<xsl:stylesheet
    version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    omit-xml-declaration="yes">

    <xsl:template match="/">
        <root>
            <books>
                <xsl:apply-templates select="root/books/book" />
            </books>
        </root>
    </xsl:template>


    <xsl:template match="book">
        <book foo="bar">
            <title>
                <xsl:value-of select="title" />
            </title>
        </book>
    </xsl:template>

</xsl:stylesheet>