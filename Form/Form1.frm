VERSION 5.00
Object = "{CDE57A40-8B86-11D0-B3C6-00A0C90AEA82}#1.0#0"; "msdatgrd.ocx"
Object = "{F0D2F211-CCB0-11D0-A316-00AA00688B10}#1.0#0"; "msdatlst.ocx"
Object = "{67397AA1-7FB1-11D0-B148-00A0C922E820}#6.0#0"; "MSADODC.OCX"
Begin VB.Form Form1 
   Caption         =   "Form1"
   ClientHeight    =   4980
   ClientLeft      =   225
   ClientTop       =   855
   ClientWidth     =   6975
   LinkTopic       =   "Form1"
   ScaleHeight     =   4980
   ScaleWidth      =   6975
   StartUpPosition =   3  'Windows Default
   Begin VB.CommandButton Cmd_cari 
      Caption         =   "Cari"
      Height          =   495
      Left            =   3960
      TabIndex        =   13
      Top             =   0
      Width           =   1215
   End
   Begin MSDataListLib.DataCombo DataCombo1 
      Bindings        =   "Form1.frx":0000
      Height          =   315
      Left            =   1680
      TabIndex        =   12
      Top             =   2520
      Width           =   1695
      _ExtentX        =   2990
      _ExtentY        =   556
      _Version        =   393216
      ListField       =   "nma_kota"
      Text            =   ""
   End
   Begin VB.OptionButton Option2 
      Caption         =   "Perempuan"
      Height          =   375
      Left            =   3000
      TabIndex        =   10
      Top             =   1320
      Width           =   1215
   End
   Begin VB.OptionButton Option1 
      Caption         =   "Laki-Laki"
      Height          =   375
      Left            =   1680
      TabIndex        =   9
      Top             =   1320
      Width           =   1095
   End
   Begin VB.CommandButton Cmd_simpan 
      Caption         =   "Simpan"
      Height          =   375
      Left            =   3840
      TabIndex        =   8
      Top             =   720
      Width           =   1575
   End
   Begin MSAdodcLib.Adodc Adodc2 
      Height          =   375
      Left            =   4080
      Top             =   2640
      Width           =   1815
      _ExtentX        =   3201
      _ExtentY        =   661
      ConnectMode     =   0
      CursorLocation  =   3
      IsolationLevel  =   -1
      ConnectionTimeout=   15
      CommandTimeout  =   30
      CursorType      =   3
      LockType        =   3
      CommandType     =   8
      CursorOptions   =   0
      CacheSize       =   50
      MaxRecords      =   0
      BOFAction       =   0
      EOFAction       =   0
      ConnectStringType=   3
      Appearance      =   1
      BackColor       =   -2147483643
      ForeColor       =   -2147483640
      Orientation     =   0
      Enabled         =   -1
      Connect         =   "DSN=kota"
      OLEDBString     =   ""
      OLEDBFile       =   ""
      DataSourceName  =   "kota"
      OtherAttributes =   ""
      UserName        =   ""
      Password        =   ""
      RecordSource    =   "select *from kota order by nma_kota"
      Caption         =   "Adodc2"
      BeginProperty Font {0BE35203-8F91-11CE-9DE3-00AA004BB851} 
         Name            =   "MS Sans Serif"
         Size            =   8.25
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      _Version        =   393216
   End
   Begin MSAdodcLib.Adodc Adodc1 
      Height          =   330
      Left            =   960
      Top             =   3240
      Width           =   2535
      _ExtentX        =   4471
      _ExtentY        =   582
      ConnectMode     =   0
      CursorLocation  =   3
      IsolationLevel  =   -1
      ConnectionTimeout=   15
      CommandTimeout  =   30
      CursorType      =   3
      LockType        =   3
      CommandType     =   8
      CursorOptions   =   0
      CacheSize       =   50
      MaxRecords      =   0
      BOFAction       =   0
      EOFAction       =   0
      ConnectStringType=   3
      Appearance      =   1
      BackColor       =   -2147483643
      ForeColor       =   -2147483640
      Orientation     =   0
      Enabled         =   -1
      Connect         =   "DSN=kota"
      OLEDBString     =   ""
      OLEDBFile       =   ""
      DataSourceName  =   "kota"
      OtherAttributes =   ""
      UserName        =   ""
      Password        =   ""
      RecordSource    =   "select *from mhs"
      Caption         =   "Adodc1"
      BeginProperty Font {0BE35203-8F91-11CE-9DE3-00AA004BB851} 
         Name            =   "MS Sans Serif"
         Size            =   8.25
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      _Version        =   393216
   End
   Begin MSDataGridLib.DataGrid DataGrid1 
      Bindings        =   "Form1.frx":0015
      Height          =   1695
      Left            =   600
      TabIndex        =   7
      Top             =   3840
      Width           =   5655
      _ExtentX        =   9975
      _ExtentY        =   2990
      _Version        =   393216
      HeadLines       =   1
      RowHeight       =   15
      FormatLocked    =   -1  'True
      BeginProperty HeadFont {0BE35203-8F91-11CE-9DE3-00AA004BB851} 
         Name            =   "MS Sans Serif"
         Size            =   8.25
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      BeginProperty Font {0BE35203-8F91-11CE-9DE3-00AA004BB851} 
         Name            =   "MS Sans Serif"
         Size            =   8.25
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      ColumnCount     =   4
      BeginProperty Column00 
         DataField       =   "NIM"
         Caption         =   "NIM"
         BeginProperty DataFormat {6D835690-900B-11D0-9484-00A0C91110ED} 
            Type            =   0
            Format          =   ""
            HaveTrueFalseNull=   0
            FirstDayOfWeek  =   0
            FirstWeekOfYear =   0
            LCID            =   1033
            SubFormatType   =   0
         EndProperty
      EndProperty
      BeginProperty Column01 
         DataField       =   "Nama"
         Caption         =   "Nama"
         BeginProperty DataFormat {6D835690-900B-11D0-9484-00A0C91110ED} 
            Type            =   0
            Format          =   ""
            HaveTrueFalseNull=   0
            FirstDayOfWeek  =   0
            FirstWeekOfYear =   0
            LCID            =   1033
            SubFormatType   =   0
         EndProperty
      EndProperty
      BeginProperty Column02 
         DataField       =   "Alamat"
         Caption         =   "Alamat"
         BeginProperty DataFormat {6D835690-900B-11D0-9484-00A0C91110ED} 
            Type            =   0
            Format          =   ""
            HaveTrueFalseNull=   0
            FirstDayOfWeek  =   0
            FirstWeekOfYear =   0
            LCID            =   1033
            SubFormatType   =   0
         EndProperty
      EndProperty
      BeginProperty Column03 
         DataField       =   "Kota"
         Caption         =   "Kota"
         BeginProperty DataFormat {6D835690-900B-11D0-9484-00A0C91110ED} 
            Type            =   0
            Format          =   ""
            HaveTrueFalseNull=   0
            FirstDayOfWeek  =   0
            FirstWeekOfYear =   0
            LCID            =   1033
            SubFormatType   =   0
         EndProperty
      EndProperty
      SplitCount      =   1
      BeginProperty Split0 
         BeginProperty Column00 
            ColumnWidth     =   1289.764
         EndProperty
         BeginProperty Column01 
            ColumnWidth     =   1739.906
         EndProperty
         BeginProperty Column02 
            ColumnWidth     =   1739.906
         EndProperty
         BeginProperty Column03 
            ColumnWidth     =   1739.906
         EndProperty
      EndProperty
   End
   Begin VB.TextBox Text3 
      Height          =   495
      Left            =   1680
      MultiLine       =   -1  'True
      ScrollBars      =   2  'Vertical
      TabIndex        =   6
      Top             =   1800
      Width           =   1695
   End
   Begin VB.TextBox Text2 
      Height          =   375
      Left            =   1680
      TabIndex        =   5
      Top             =   840
      Width           =   1455
   End
   Begin VB.TextBox Text1 
      Height          =   375
      Left            =   1800
      TabIndex        =   4
      Top             =   240
      Width           =   1215
   End
   Begin VB.Label Label5 
      Caption         =   "Jenis Kelamin"
      Height          =   255
      Left            =   240
      TabIndex        =   11
      Top             =   1440
      Width           =   1335
   End
   Begin VB.Label Label4 
      Caption         =   "Kota"
      Height          =   255
      Left            =   240
      TabIndex        =   3
      Top             =   2400
      Width           =   1215
   End
   Begin VB.Label Label3 
      Caption         =   "Alamat"
      Height          =   375
      Left            =   240
      TabIndex        =   2
      Top             =   1800
      Width           =   1215
   End
   Begin VB.Label Label2 
      Caption         =   "Nama"
      Height          =   375
      Left            =   240
      TabIndex        =   1
      Top             =   840
      Width           =   1215
   End
   Begin VB.Label Label1 
      Caption         =   "NIM"
      Height          =   375
      Left            =   120
      TabIndex        =   0
      Top             =   240
      Width           =   1215
   End
   Begin VB.Menu menu 
      Caption         =   "Menu"
      Begin VB.Menu data 
         Caption         =   "Data"
      End
      Begin VB.Menu hai 
         Caption         =   "Hai"
      End
   End
End
Attribute VB_Name = "Form1"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Cmd_cari_Click()
Adodc1.RecordSource = "select * from mhs where nim Like '" & _
                        Text1.Text & "'"
Adodc1.Refresh
DataGrid1.Refresh
If Adodc1.Recordset.EOF Then
    MsgBox "Data Tidak Ditemukan"
    Adodc1.RecordSource = "select * from mhs"
    Adodc.Refresh
    DataGrid1.Refresh
Else
    With Adodc1.Recordset
    Text2.Text = !nama
    If "Laki-Laki" = !jenis_kelamin Then
        Option1.Value = True
    Else
        Option2.Value = True
    End If
    Text3.Text = !alamat
    DataCombo1.Text = !Kota
    End With
End If
End Sub

Private Sub Cmd_simpan_Click()
With Adodc1.Recordset
    .AddNew
    !NIM = Text1.Text
    !nama = Text2.Text
    If Option1.Value = True Then
        !jenis_kelamin = "Laki-Laki"
    Else
        !jenis_kelamin = "perempuan"
    End If
    !alamat = Text3.Text
    !Kota = DataCombo1.Text
.Update
End With
End Sub
