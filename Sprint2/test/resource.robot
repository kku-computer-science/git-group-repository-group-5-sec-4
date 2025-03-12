*** Settings ***
Library    SeleniumLibrary
Library    String

*** Variables ***
${URL}    https://cs0567.cpkkuhost.com/
${BROWSER}    chrome
${CHROMEDRIVER_PATH}    ./ChromeDriver/chromedriver.exe    # Path to your chromedriver

# For Switch language
${DROPDOWN_lang}    xpath=//a[@id='navbarDropdownMenuLink']
${MENU_TH}     //*[@id="collapsibleNavbar"]/ul/li[6]/div/a[1]/span
${MENU_CN}     //*[@id="collapsibleNavbar"]/ul/li[6]/div/a[2]/span

# Menu location
${Home}    //*[@id="collapsibleNavbar"]/ul/li[1]/a
${Researchers}    //*[@id="collapsibleNavbar"]/ul/li[2]/a
#in drop down researchers
${CS}    //*[@id="collapsibleNavbar"]/ul/li[2]/ul/li[1]/a
${IT}    //*[@id="collapsibleNavbar"]/ul/li[2]/ul/li[2]/a
${GIS}   //*[@id="collapsibleNavbar"]/ul/li[2]/ul/li[3]/a
${AI}    //*[@id="collapsibleNavbar"]/ul/li[2]/ul/li[4]/a
${CYBER}    //*[@id="collapsibleNavbar"]/ul/li[2]/ul/li[5]/a

${Research_Project}    //*[@id="collapsibleNavbar"]/ul/li[3]/a
${Research_Group}    //*[@id="collapsibleNavbar"]/ul/li[4]/a
${Reports}    //*[@id="collapsibleNavbar"]/ul/li[5]/a
#${Login}    //*[@id="collapsibleNavbar"]/span/a

#location for check------------------------------------------------------------
   #home page   
${home_banner_path}   xpath=/html/body/div/div[1]/div/div[2]/div[1]/img
   #researchers page
${Researchers_page_title_path}    xpath=/html/body/div/p
${Researchers_page_span_path}     xpath=/html/body/div/span
${CS}    //*[@id="collapsibleNavbar"]/ul/li[2]/ul/li[1]/a
${Researchers_card_path}    xpath=/html/body/div/div[2]/a[2]/div/div/div[2]/div/h5[1]
${Researchers_info_path}    xpath=/html/body/div/div[2]/a[2]
${info_education}    xpath=/html/body/div/div[1]/div/div[2]/div/h6[4]
${info_publications}    xpath=/html/body/div/div[1]/div/div[3]/h6
    #researcher project
${Research_Project_page_title}    xpath=/html/body/div/p
    #researchers group
${Research_Group_page_title}    xpath=/html/body/div/p
${details_research_group_button}    xpath=/html/body/div/div[1]/div/div[2]/div[2]/a
${lab_title}    xpath=/html/body/div/div/div/div[1]/div/h1[1]
    #report page
${Reports_page_title}    xpath=/html/body/div[1]/div/div/h5
#Expected  -----------------------------------------------------------
# Expected menu text in EN
${EXPECTED_Home_EN}    HOME
${EXPECTED_Researchers_EN}    RESEARCHERS
# in dropdawn 
${EXPECTED_CS_EN}     Computer Science
${EXPECTED_IT_EN}     Infomation Technology
${EXPECTED_GIS_EN}    Geo-Informatics
${EXPECTED_AI_EN}    Artificial Intelligence
${EXPECTED_CYBER_EN}    Cybersecurity

${EXPECTED_Research_Project_EN}    RESEARCH PROJECT
${EXPECTED_Research_Group_EN}    RESEARCH GROUP
${EXPECTED_Reports_EN}   REPORTS
#${EXPECTED_Login_EN}    LOGIN

# Expected menu text in TH
${EXPECTED_Home_TH}    หน้าแรก
${EXPECTED_Researchers_TH}    ผู้วิจัย
#in dropdown
${EXPECTED_CS_TH}    สาขาวิชาวิทยาการคอมพิวเตอร์
${EXPECTED_IT_TH}     สาขาวิชาเทคโนโลยีสารสนเทศ
${EXPECTED_GIS_TH}    สาขาวิชาภูมิสารสนเทศศาสตร์
${EXPECTED_AI_TH}    สาขาปัญญาประดิษฐ์
${EXPECTED_CYBER_TH}    สาขาความมั่นคงปลอดภัยไซเบอร์

${EXPECTED_Research_Project_TH}    โครงการวิจัย
${EXPECTED_Research_Group_TH}    กลุ่มวิจัย
${EXPECTED_Reports_TH}    รายงาน
#${EXPECTED_Login_TH}    เข้าสู่ระบบ

# Expected menu text in CN

${EXPECTED_Home_CN}    首页
${EXPECTED_Researchers_CN}    研究人员
#in dropdown
${EXPECTED_CS_CN}    计算机科学
${EXPECTED_IT_CN}     信息技术
${EXPECTED_GIS_CN}    地理信息科学
${EXPECTED_AI_CN}    人工智能
${EXPECTED_CYBER_CN}    网络安全


${EXPECTED_Research_Project_CN}    研究项目
${EXPECTED_Research_Group_CN}      研究小组
${EXPECTED_Reports_CN}    报告
#${EXPECTED_Login_CN}    登录

#Expected page-----------------------------------------------------------
    #home
${EXPECTED_home_banner_EN}   https://cs0567.cpkkuhost.com/img/banner1-en.png
${EXPECTED_home_banner_TH}   https://cs0567.cpkkuhost.com/img/banner1-th.png
${EXPECTED_home_banner_CN}   https://cs0567.cpkkuhost.com/img/banner1-cn.png
    #researcher
${EXPECTED_researchers_title_EN}    RESEARCHERS
${EXPECTED_researchers_title_TH}    ผู้วิจัย
${EXPECTED_researchers_title_CN}    研究人员

${EXPECTED_researchers_span_EN}    COMPUTER SCIENCE
${EXPECTED_researchers_span_TH}    สาขาวิชาวิทยาการคอมพิวเตอร์
${EXPECTED_researchers_span_CN}    计算机科学

    #researcher detail
${EXPECTED_researchers_detail_title_EN}    Publications
${EXPECTED_researchers_detail_title_TH}    ผลงานตีพิมพ์
${EXPECTED_researchers_detail_title_CN}    出版物

${EXPECTED_researchers_detail_education_EN}    Education
${EXPECTED_researchers_detail_education_TH}    การศึกษา
${EXPECTED_researchers_detail_education_CN}    教育背景

    #research project
${EXPECTED_research_project_title_EN}    Academic Service Project/Research Project
${EXPECTED_research_project_title_TH}    โครงการบริการวิชาการ/ โครงการวิจัย
${EXPECTED_research_project_title_CN}    学术服务项目/研究项目

    #group 
${EXPECTED_researchers_group_title_EN}    RESEARCH GROUP
${EXPECTED_researchers_group_title_TH}    กลุ่มวิจัย
${EXPECTED_researchers_group_title_CN}    研究小组

${EXPECTED_researchers_group_details_lab_EN}    Laboratory Supervisor
${EXPECTED_researchers_group_details_lab_TH}    หัวหน้าห้องปฏิบัติการ
${EXPECTED_researchers_group_details_lab_CN}    实验室主管

    #reports
${EXPECTED_reports_title_EN}    Total Articles Statistics for 5 Years
${EXPECTED_reports_title_TH}    สถิติจำนวนบทความทั้งหมด 5 ปี
${EXPECTED_reports_title_CN}    过去五年的文章统计数据
#------------------------------------------------------------------------



*** Keywords ***
Open site
    Open Browser    ${URL}    ${BROWSER}    executable_path=${CHROMEDRIVER_PATH}
    Maximize Browser Window
    Sleep    3s

# Select language
Toggle dropdown
    Click Element    ${DROPDOWN_lang}
    Wait Until Element Is Visible    ${DROPDOWN_lang}    timeout=5s

Select TH
    Click Element    ${MENU_TH}
    Wait Until Page Contains    ${EXPECTED_Home_TH}    timeout=10s

Select CN
    Click Element    ${MENU_CN}
    Wait Until Page Contains    ${EXPECTED_Home_CN}    timeout=10s


# Click link in navbar----------------------------------------------

Click Researchers Link
    Click Element    ${Researchers}
Click Reseachers cs link 
    Click Element    ${CS}
Click Research Project link
    Click Element   ${Research_Project}
Click Research Group link
    Click Element    ${Research_Group}
Click Reports link
    Click Element    ${Reports}
#--------------------------------------------------------------------------
#default
Check default is EN
    Check Navbar Menu Text is EN

# navbar check--------------------------------------------------------------
# Check navbar menu text in EN
Check Navbar Menu Text is EN
    ${text_1}    Get Text    ${Home}
    Should Be Equal As Strings    ${text_1}    ${EXPECTED_Home_EN}

    ${text_2}    Get Text    ${Researchers}
    Should Be Equal As Strings    ${text_2}    ${EXPECTED_Researchers_EN}
    
    ${text_3}    Get Text    ${Research_Project} 
    Should Be Equal As Strings    ${text_3}    ${EXPECTED_Research_Project_EN}

    ${text_4}    Get Text    ${Research_Group}
    Should Be Equal As Strings    ${text_4}    ${EXPECTED_Research_Group_EN}

    ${text_5}    Get Text    ${Reports}
    Should Be Equal As Strings    ${text_5}    ${EXPECTED_Reports_EN}

    #${text_6}    Get Text    ${Login} 
    #Should Be Equal As Strings    ${text_6}    ${EXPECTED_Login_EN}

Check reseachers dropdown is EN
    ${text_1}    Get Text    ${CS}
    Should Be Equal As Strings    ${text_1}    ${EXPECTED_CS_EN}

    ${text_2}    Get Text    ${IT}
    Should Be Equal As Strings    ${text_2}    ${EXPECTED_IT_EN}
    
    ${text_3}    Get Text    ${GIS} 
    Should Be Equal As Strings    ${text_3}    ${EXPECTED_GIS_EN}

    ${text_4}    Get Text    ${AI}
    Should Be Equal As Strings    ${text_4}    ${EXPECTED_AI_EN}

    ${text_5}    Get Text    ${CYBER}
    Should Be Equal As Strings    ${text_5}    ${EXPECTED_CYBER_EN}

# Check navbar menu text in TH
Check Navbar Menu Text is TH
    ${text_1}    Get Text    ${Home}
    Should Be Equal As Strings    ${text_1}    ${EXPECTED_Home_TH}

    ${text_2}    Get Text    ${Researchers}
    Should Be Equal As Strings    ${text_2}    ${EXPECTED_Researchers_TH}

    ${text_3}    Get Text    ${Research_Project} 
    Should Be Equal As Strings    ${text_3}    ${EXPECTED_Research_Project_TH}

    ${text_4}    Get Text    ${Research_Group}
    Should Be Equal As Strings    ${text_4}    ${EXPECTED_Research_Group_TH}

    ${text_5}    Get Text    ${Reports}
    Should Be Equal As Strings    ${text_5}    ${EXPECTED_Reports_TH}

    #${text_6}    Get Text    ${Login} 
    #Should Be Equal As Strings    ${text_6}    ${EXPECTED_Login_TH}
Check reseachers dropdown is TH
    ${text_1}    Get Text    ${CS}
    Should Be Equal As Strings    ${text_1}    ${EXPECTED_CS_TH}

    ${text_2}    Get Text    ${IT}
    Should Be Equal As Strings    ${text_2}    ${EXPECTED_IT_TH}
    
    ${text_3}    Get Text    ${GIS} 
    Should Be Equal As Strings    ${text_3}    ${EXPECTED_GIS_TH}

    ${text_4}    Get Text    ${AI}
    Should Be Equal As Strings    ${text_4}    ${EXPECTED_AI_TH}

    ${text_5}    Get Text    ${CYBER}
    Should Be Equal As Strings    ${text_5}    ${EXPECTED_CYBER_TH}
# Check navbar menu text in CN
Check Navbar Menu Text is CN
    ${text_1}    Get Text    ${Home}
    Should Be Equal As Strings    ${text_1}    ${EXPECTED_Home_CN}

    ${text_2}    Get Text    ${Researchers}
    Should Be Equal As Strings    ${text_2}    ${EXPECTED_Researchers_CN}

    ${text_3}    Get Text    ${Research_Project} 
    Should Be Equal As Strings    ${text_3}    ${EXPECTED_Research_Project_CN}

    ${text_4}    Get Text    ${Research_Group}
    Should Be Equal As Strings    ${text_4}    ${EXPECTED_Research_Group_CN}

    ${text_5}    Get Text    ${Reports}
    Should Be Equal As Strings    ${text_5}    ${EXPECTED_Reports_CN}

    #${text_6}    Get Text    ${Login} 
    #Should Be Equal As Strings    ${text_6}    ${EXPECTED_Login_CN}

Check reseachers dropdown is CN

    ${text_1}    Get Text    ${CS}
    Should Be Equal As Strings    ${text_1}    ${EXPECTED_CS_CN}

    ${text_2}    Get Text    ${IT}
    Should Be Equal As Strings    ${text_2}    ${EXPECTED_IT_CN}
    
    ${text_3}    Get Text    ${GIS} 
    Should Be Equal As Strings    ${text_3}    ${EXPECTED_GIS_CN}

    ${text_4}    Get Text    ${AI}
    Should Be Equal As Strings    ${text_4}    ${EXPECTED_AI_CN}

    ${text_5}    Get Text    ${CYBER}
    Should Be Equal As Strings    ${text_5}    ${EXPECTED_CYBER_CN}
#-----------------------------------------------------------------------------------------

# Check image banner in home page--------------------------------------------------------
Check banner home page is EN
    Wait Until Element Is Visible    ${home_banner_path}    timeout=10s
    ${src_home_banner}=    Get Element Attribute    ${home_banner_path}    src
    Should Be Equal As Strings     ${src_home_banner}   ${EXPECTED_home_banner_EN}
    Log    Banner SRC: ${src_home_banner}

Check banner home page is TH     
   
    ${src_home_banner}=    Get Element Attribute    ${home_banner_path}    src
   
    Should Be Equal As Strings     ${src_home_banner}   ${EXPECTED_home_banner_TH}
    Log    Banner SRC: ${src_home_banner}

Check banner home page is CN     
    
    ${src_home_banner}=    Get Element Attribute    ${home_banner_path}    src
   
    Should Be Equal As Strings     ${src_home_banner}   ${EXPECTED_home_banner_CN}
    Log    Banner SRC: ${src_home_banner}



#-------------------------------------------------------------------------------------------

#researchers page---------------------------------------------------------------------------
Check reseachers page is EN
    ${title}    Get Text    ${Researchers_page_title_path}
    ${span}    Get Text    ${Researchers_page_span_path}
    Should Be Equal As Strings   ${title}    ${EXPECTED_researchers_title_EN}
    Should Be Equal As Strings   ${span}    ${EXPECTED_researchers_span_EN}
    Log    Researchers title : ${title}
    Log    Researchers span : ${span}
Check reseachers page is TH
    ${title}    Get Text    ${Researchers_page_title_path}
    ${span}    Get Text    ${Researchers_page_span_path}
    Should Be Equal As Strings   ${title}    ${EXPECTED_researchers_title_TH}
    Should Be Equal As Strings   ${span}    ${EXPECTED_researchers_span_TH}
    Log    Researchers title : ${title}
    Log    Researchers span : ${span}

Check reseachers page is CN
    ${title}    Get Text    ${Researchers_page_title_path}
    ${span}    Get Text    ${Researchers_page_span_path}
    Should Be Equal As Strings   ${title}    ${EXPECTED_researchers_title_CN}
    Should Be Equal As Strings   ${span}    ${EXPECTED_researchers_span_CN}
    Log    Researchers title : ${title}
    Log    Researchers span : ${span}
#----------------------------------------------------------------------------------
Check Infomation reseachers page is EN
    Click Element    ${Researchers_info_path}
    ${education}    Get Text    ${info_education}
    ${title}    Get Text    ${info_publications}
    Should Be Equal As Strings    ${education}  ${EXPECTED_researchers_detail_education_EN}
    Should Be Equal As Strings    ${title}    ${EXPECTED_researchers_detail_title_EN}
    
    Log    education: ${education}
    Log    title: ${title}

Check Infomation reseachers page is TH
    Click Element    ${Researchers_info_path}
    ${education}    Get Text    ${info_education}
    ${title}    Get Text    ${info_publications}
    Should Be Equal As Strings    ${education}  ${EXPECTED_researchers_detail_education_TH}
    Should Be Equal As Strings    ${title}    ${EXPECTED_researchers_detail_title_TH}
    
    Log    education: ${education}
    Log    title: ${title}
Check Infomation reseachers page is CN
    Click Element    ${Researchers_info_path}
    ${education}    Get Text    ${info_education}
    ${title}    Get Text    ${info_publications}
    Should Be Equal As Strings    ${education}  ${EXPECTED_researchers_detail_education_CN}
    Should Be Equal As Strings    ${title}    ${EXPECTED_researchers_detail_title_CN}
    
    Log    education: ${education}
    Log    title: ${title}
#researcher project----------------------------------------------------------------
Check reseachers project page is EN 
    ${title}    Get Text    ${Research_Project_page_title}
    Should Be Equal As Strings    ${title}    ${EXPECTED_research_project_title_EN}
    Log    title : ${title}
Check reseachers project page is TH 
    ${title}    Get Text    ${Research_Project_page_title}
    Should Be Equal As Strings    ${title}    ${EXPECTED_research_project_title_TH}
    Log    title : ${title}
Check reseachers project page is CN
    ${title}    Get Text    ${Research_Project_page_title}
    Should Be Equal As Strings    ${title}    ${EXPECTED_research_project_title_CN}
    Log    title : ${title}
#------------------------------------------------------------------------------------

#research group----------------------------------------------------------------------
Check research group page is EN
    ${title}    Get Text    ${Research_Group_page_title}
    Should Be Equal As Strings    ${title}    	${EXPECTED_researchers_group_title_EN}
    Log    title: ${title}
Check research group page is TH
    ${title}    Get Text    ${Research_Group_page_title}
    Should Be Equal As Strings    ${title}    	${EXPECTED_researchers_group_title_TH}
    Log    title: ${title}
Check research group page is CN
    ${title}    Get Text    ${Research_Group_page_title}
    Should Be Equal As Strings    ${title}    	${EXPECTED_researchers_group_title_CN}
    Log    title: ${title}
#-------------------------------------------------------------------------------------

# group details-----------------------------------------------------------------------
check research group page details is EN
    Click Element    ${details_research_group_button}
    ${title}    Get Text    ${lab_title}
    Should Be Equal As Strings    ${title}    ${EXPECTED_researchers_group_details_lab_EN}
    Log    title: ${title}
check research group page details is TH
    Click Element    ${details_research_group_button}
    ${title}    Get Text    ${lab_title}
    Should Be Equal As Strings    ${title}    ${EXPECTED_researchers_group_details_lab_TH}
    Log    title: ${title}
check research group page details is CN
    Click Element    ${details_research_group_button}
    ${title}    Get Text    ${lab_title}
    Should Be Equal As Strings    ${title}    ${EXPECTED_researchers_group_details_lab_CN}
    Log    title: ${title}
#---------------------------------------------------------------------------------------------

#reports--------------------------------------------------------------------------------------
check reports page is EN
    ${title}    Get Text    ${Reports_page_title}
    Should Be Equal As Strings    ${title}     ${EXPECTED_reports_title_EN}
    Log    title: ${title}
check reports page is TH
    ${title}    Get Text    ${Reports_page_title}
    Should Be Equal As Strings    ${title}     ${EXPECTED_reports_title_TH}
    Log    title: ${title}
check reports page is CN
    ${title}    Get Text    ${Reports_page_title}
    Should Be Equal As Strings    ${title}     ${EXPECTED_reports_title_CN}
    Log    title: ${title}
#---------------------------------------------------------------------------------------------
Close Browser Session
    Close Browser
