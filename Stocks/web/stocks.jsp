
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %> 
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ page import="stocks.*" %> 

<c:import url="/views/header.jsp" />

<% // for manual syntax -  see below
    Stock stockAttribute = (Stock) request.getAttribute("stock");
    if (stockAttribute == null) {
        stockAttribute = new Stock();
    }
%>

<h2>Stocks?!</h2>

<table>
    <tr>
        <th>Symbol</th>
        <th>Name</th>
        <th>Current Price</th>
        <th>Purchase Price</th>
        <th>Value</th>
    </tr>
    <tr>
        <%-- JSP Expression Language synatx --%>
        <td>${stock.symbol}</td>
        <td>${stock.name}</td>
        <td>${stock.currentPrice}</td>
        <td>${stock.purchasePrice}</td>
        <td>${stock.value}</td>
    </tr>
    <tr>
        <%-- Manual synatx + see code above --%>
        <td><%= stockAttribute.getSymbol()%></td>
        <td><%= stockAttribute.getName()%></td>
        <td><%= stockAttribute.getCurrentPrice()%></td>
        <td><%= stockAttribute.getPurchasePrice()%></td>
        <td><%= stockAttribute.getValue()%></td>
    </tr>
    <tr>
        <%-- JSTL tag synatx --%>
        <jsp:useBean id="stock" scope="request" class="stocks.Stock" />
        <td><jsp:getProperty name="stock" property="symbol"/></td>
        <td><jsp:getProperty name="stock" property="name"/></td>
        <td><jsp:getProperty name="stock" property="currentPrice"/></td>
        <td><jsp:getProperty name="stock" property="purchasePrice"/></td>
        <td><jsp:getProperty name="stock" property="value"/></td>
    </tr>

    <c:forEach var="stockInList" items="${stocks}">
        <tr>
            <td>${stockInList.symbol}</td>
            <td>${stockInList.name}</td>
            <td>${stockInList.currentPrice}</td>
            <td>${stockInList.purchasePrice}</td>
            <td>${stockInList.value}</td>
        </tr>
    </c:forEach>

    <c:forEach var="stockInPortfolio" items="${portfolio.stocks}"
               begin="0" end="10" step="1" varStatus="status">
        <tr>
            <td>${status.index}: ${stockInPortfolio.symbol}</td>
            <td>${stockInPortfolio.name}</td>
            <td>${stockInPortfolio.currentPrice}</td>
            <td>${stockInPortfolio.purchasePrice}</td>
            <td>${stockInPortfolio.value}</td>
        </tr>
    </c:forEach>
</table>


<p>Single stock from Stocks attribute ${stocks[0].name}</p>

<p>Single stock from Portfolio attribute ${portfolio.stocks[0].name}</p>
<p>
    Total value of portfolio: $ 
    <c:if test="${portfolio.totalValue < 0}">
        <font color="red">
    </c:if>
    ${portfolio.totalValue}
    <c:if test="${portfolio.totalValue < 0}">
        </font>         
    </c:if>
</p>
<p>
    Total value of portfolio: $ 
    <c:choose>
        <c:when test="${portfolio.totalValue < 0}">
            <font color="red">
        </c:when>
        <c:otherwise>
            <font color="green"> 
        </c:otherwise>
    </c:choose> 
    ${portfolio.totalValue}
    </font>  
</p>

<%
    Portfolio portfolioAttribute = (Portfolio) request.getAttribute("portfolio");
    if (portfolioAttribute.getTotalValue() < 0) {
%> <font color="red"> <%
    } else { %>
<font color="green"> <%
    } %>
<%= portfolioAttribute.getTotalValue() %>
</font>


<c:import url="/views/footer.jsp" />


