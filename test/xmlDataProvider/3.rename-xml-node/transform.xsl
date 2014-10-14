<xsl:stylesheet
    version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    omit-xml-declaration="yes">

    <xsl:template match="*">
        <xsl:copy>
            <xsl:apply-templates select="node()|@*"/>
        </xsl:copy>
    </xsl:template>

    <!-- replace the book node -->
    <xsl:template match="book" priority="1">
        <renamedBookNode>
            <xsl:copy-of select="./*"/>
        </renamedBookNode>
    </xsl:template>    
        
    <!-- match all other nodes -->
    <xsl:template match="@*|text()|comment()|processing-instruction()" priority="2">
        <xsl:copy-of select="."/>
    </xsl:template>

</xsl:stylesheet>