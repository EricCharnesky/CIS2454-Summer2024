<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %> 
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<c:import url="/views/header.jsp" />

        <h1>Hello World!</h1>
        <p>Welcome <c:out value="${param.username}" default="no name" /> email: <c:out value="${param.email}"/></p>
            <form action="Stocks" method="get">
        <label>User Name</label>
        <input type="text" name="username"/><br>
        <label>Email address</label>
        <input type="text" name="email"/><br>
        <input type="hidden" name="action" value ="forms"/>

        <input type="submit" value="Register"/>
    </form>
<c:import url="/views/footer.jsp" />